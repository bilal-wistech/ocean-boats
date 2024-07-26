<?php
namespace NaeemAwan\PredefinedLists\Http\Controllers;

use Botble\Base\Http\Controllers\BaseController;
use NaeemAwan\PredefinedLists\Tables\PDLDiscountTable;
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
}