<?php
namespace NaeemAwan\PredefinedLists\Forms;

use Assets;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Botble\Base\Forms\FormAbstract;
use NaeemAwan\PredefinedLists\Models\BoatDiscount;
use NaeemAwan\PredefinedLists\Http\Requests\PDLDiscountRequest;
use NaeemAwan\PredefinedLists\Repositories\Interfaces\PredefinedListInterface;

class PDLDiscountForm extends FormAbstract
{
    public function buildForm(): void
    {
        $predefinedListRepository = app(PredefinedListInterface::class);
        $pdlLabels = DB::select(DB::raw('
        WITH RECURSIVE ParentHierarchy AS (
            SELECT 
                id,
                ltitle,
                parent_id,
                id AS top_parent_id,
                ltitle AS top_parent_title
            FROM predefined_list
            WHERE parent_id = 0
            
            UNION ALL
            
            SELECT
                child.id,
                child.ltitle,
                child.parent_id,
                ph.top_parent_id,
                ph.top_parent_title
            FROM predefined_list AS child
            JOIN ParentHierarchy AS ph ON child.parent_id = ph.id
        )
        SELECT
            child.id AS child_id,
            child.ltitle AS child_title,
            parent.id AS parent_id,
            parent.ltitle AS parent_title,
            ph.top_parent_id,
            ph.top_parent_title
        FROM predefined_list AS child
        LEFT JOIN predefined_list AS parent ON child.parent_id = parent.id
        LEFT JOIN ParentHierarchy AS ph ON child.id = ph.id
        WHERE (child.file IS NOT NULL OR child.color IS NOT NULL)
           OR child.parent_id = 0;
    '));
        // dd($pdlLabels);
        $choices = [];
        foreach ($pdlLabels as $label) {
            // Build the display text conditionally
            $displayText = $label->child_title;
            if (!empty($label->parent_title)) {
                $displayText .= ' - ' . $label->parent_title;
            }
            if (!empty($label->top_parent_title) && $label->top_parent_title !== $label->child_title) {
                $displayText .= ' - ' . $label->top_parent_title;
            }
            // Append (boat) or (accessory) conditionally
            if ($label->parent_id === null) {
                $displayText .= ' (boat)';
            } else {
                $displayText .= '';
            }

            $choices[$label->child_id] = $displayText;
        }
        $this
            ->setupModel(new BoatDiscount())
            ->setValidatorClass(PDLDiscountRequest::class)
            ->withCustomFields()
            ->add('code', 'text', [
                'label' => 'Code',
                'label_attr' => ['class' => 'control-label required'],
                'attr' => [
                    'placeholder' => 'Enter the code',
                    'data-counter' => 120,
                    'id' => 'discount-code-input',
                ],
                'wrapper' => [
                    'class' => 'form-group col-md-9',
                ],
            ])
            ->add('generate_code', 'html', [
                'html' => '
                    <div class="form-group col-md-3">
                        <label class="control-label">&nbsp;</label>
                        <button type="button" id="generate-code-btn" class="btn btn-info">Generate Random Code</button>
                    </div>
                ',
            ])
            ->add('list_id', 'select', [
                'label' => 'Boat/Accessory',
                'label_attr' => ['class' => 'control-label required'],
                'choices' => $choices,
                'attr' => [
                    'class' => 'form-control select-full predefined_list_discount',
                ],
            ])
            ->add('discount_type', 'customSelect', [
                'label' => 'Select Type of Discount',
                'label_attr' => ['class' => 'control-label required'],
                'attr' => [
                    'class' => 'form-control select-full',
                ],
                'choices' => getDiscountTypeArr(),
            ])
            ->add('discount', 'text', [
                'label' => 'Discount Amount/Percentage',
                'label_attr' => ['class' => 'control-label required'],
                'attr' => [
                    'placeholder' => 'Enter Discount Amount/Percentage',
                    'data-counter' => 10,
                ],
            ])
            ->add('valid_from', 'datePicker', [
                'label' => __('Valid From'),
                'label_attr' => ['class' => 'control-label required'],
                'attr' => [
                    'class' => 'form-control',
                    'data-date-format' => 'yyyy/mm/dd',
                ],
                'default_value' => Carbon::now()->format('Y/m/d'),
            ])
            ->add('valid_to', 'datePicker', [
                'label' => __('Valid To'),
                'label_attr' => ['class' => 'control-label required'],
                'attr' => [
                    'class' => 'form-control',
                    'data-date-format' => 'yyyy/mm/dd',
                ],
                'default_value' => Carbon::now()->format('Y/m/d'),
            ])
            ->add('never_expires', 'onOff', [
                'label' => 'Never Expires',
                'label_attr' => ['class' => 'control-label'],
                'default_value' => 0,
            ]);


        Assets::addScriptsDirectly('vendor/core/core/base/js/predefined-lists-discount-form.js');
    }
}
