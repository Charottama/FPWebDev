<?php

namespace App\Admin\Controllers;

use App\Models\Recipe;
use App\Models\Transaction;
use App\User;


use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;
class AdminTransactionController extends Controller
{
    use ModelForm;

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('header');
            $content->description('description');

            $content->body($this->grid());
        });
    }

    /**
     * Edit interface.
     *
     * @param $id
     * @return Content
     */
    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {

            $content->header('header');
            $content->description('description');

            $content->body($this->form()->edit($id));
        });
    }

    /**
     * Create interface.
     *
     * @return Content
     */
    public function create()
    {
        return Admin::content(function (Content $content) {

            $content->header('header');
            $content->description('description');

            $content->body($this->form());
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(transaction::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->columns('user_id', 'recipe_id', 'address', 'phone', 'total_price', 'quantity', 'payment', '
    	time');

            // $grid->created_at();
            // $grid->updated_at();
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(transaction::class, function (Form $form) {


            $form->display('id', 'ID');

            $form->select('user_id')->options(user::all()->pluck('name','id'));            
            $form->select('recipe_id')->options(recipe::all()->pluck('food_name','id'));

            // $form->display('recipe_id');
            // $form->display('user_id');            
            $form->text('address');
            $form->text('phone');
            $form->number('total_price');
            $form->number('quantity');
            $form->text('payment');
			$form->display('created_at', 'Created At');
            // $form->display('updated_at', 'Updated At');
            // $form->disableSubmit();
        });
    }
}

