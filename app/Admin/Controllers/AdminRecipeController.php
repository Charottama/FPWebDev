<?php

namespace App\Admin\Controllers;

use App\Models\Recipe;
use App\Models\Chef;


use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class AdminRecipeController extends Controller
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
        return Admin::grid(Recipe::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->columns('chef_id', 'food_name', 'price', 'prep_time', 'servings', 'nutritions', 'image');

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
        return Admin::form(Recipe::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->select('chef_id')->options(Chef::all()->pluck('chef_name','id'));

            // Call to undefined method Encore\Admin\Form\Field\Select::option()
            // 'name', 'price', 'prepTime', 'servings', 'nutrition', 'imgURL', 'description',
            $form->text('food_name');
            $form->number('price');
            $form->number('prep_time');
            $form->number('servings');
            $form->number('nutritions');
            $form->text('image');


            // $form->display('created_at', 'Created At');
            // $form->display('updated_at', 'Updated At');
        });
   
}
}
