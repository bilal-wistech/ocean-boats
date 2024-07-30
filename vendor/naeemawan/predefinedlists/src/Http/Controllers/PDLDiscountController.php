<?php
namespace NaeemAwan\PredefinedLists\Http\Controllers;

use Illuminate\Http\Request;
use Botble\Base\Forms\FormBuilder;
use Botble\Base\Events\CreatedContentEvent;
use Botble\Base\Events\DeletedContentEvent;
use Botble\Base\Events\UpdatedContentEvent;
use Botble\Base\Events\BeforeEditContentEvent;
use Botble\Base\Http\Controllers\BaseController;
use Botble\Base\Http\Responses\BaseHttpResponse;
use NaeemAwan\PredefinedLists\Forms\PDLDiscountForm;
use NaeemAwan\PredefinedLists\Tables\PDLDiscountTable;
use NaeemAwan\PredefinedLists\Http\Requests\PDLDiscountRequest;
use NaeemAwan\PredefinedLists\Http\Requests\PredefinedCategoryRequest;
use NaeemAwan\PredefinedLists\Repositories\Interfaces\PDLDiscountInterface;

class PDLDiscountController extends BaseController
{
    protected PDLDiscountInterface $pdlDiscountRepository;

    public function __construct(PDLDiscountInterface $pdlDiscountRepository)
    {
        $this->pdlDiscountRepository = $pdlDiscountRepository;
    }

    public function index(PDLDiscountTable $table)
    {
        return $table->renderTable();
    }
    public function create(FormBuilder $formBuilder)
    {
        page_title()->setTitle('Predefine List Discount Create');

        return $formBuilder->create(PDLDiscountForm::class)->setFormOption('url', route('custom-boat-discounts.store'))->renderForm();
    }

    public function store(PDLDiscountRequest $request, BaseHttpResponse $response)
    {
        $pdlDiscount = $this->pdlDiscountRepository->createOrUpdate($request->input());

        event(new CreatedContentEvent(ADS_MODULE_SCREEN_NAME, $request, $pdlDiscount));

        return $response
            ->setPreviousUrl(route('custom-boat-discounts'))
            ->setNextUrl(route('custom-boat-discounts.create', $pdlDiscount->id))
            ->setMessage(trans('core/base::notices.create_success_message'));
    }
    public function edit(int $id, FormBuilder $formBuilder, Request $request)
    {
        $pdlDiscount = $this->pdlDiscountRepository->findOrFail($id);

        event(new BeforeEditContentEvent($request, $pdlDiscount));

        page_title()->setTitle("Edit");

        return $formBuilder->create(PDLDiscountForm::class, ['model' => $pdlDiscount])->setFormOption('url', route('custom-boat-discounts.update', $id))->renderForm();
    }

    public function update(int $id, PDLDiscountRequest $request, BaseHttpResponse $response)
    {
        $pdlDiscount = $this->pdlDiscountRepository->findOrFail($id);

        $pdlDiscount->fill($request->input());

        $this->pdlDiscountRepository->createOrUpdate($pdlDiscount);

        event(new UpdatedContentEvent(ADS_MODULE_SCREEN_NAME, $request, $pdlDiscount));

        return $response
            ->setPreviousUrl(route('custom-boat-discounts', $pdlDiscount->id))
            ->setMessage(trans('core/base::notices.update_success_message'));
    }

    public function destroy(Request $request, int $id, BaseHttpResponse $response)
    {
        try {
            $pdlDiscount = $this->pdlDiscountRepository->findOrFail($id);

            $this->pdlDiscountRepository->delete($pdlDiscount);

            event(new DeletedContentEvent(ADS_MODULE_SCREEN_NAME, $request, $pdlDiscount));

            return $response->setMessage(trans('core/base::notices.delete_success_message'));
        } catch (Exception $exception) {
            return $response
                ->setError()
                ->setMessage($exception->getMessage());
        }
    }
}