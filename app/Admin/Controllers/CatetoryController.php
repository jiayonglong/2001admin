<?php

namespace App\Admin\Controllers;

use App\Model\CategoryModel;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;

use Encore\Admin\Tree;

class CatetoryController extends AdminController
{

    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'CategoryModel';
    public function index(Content $content)
    {
        $tree = new Tree(new CategoryModel);

        return $content
            ->header('树状模型')
            ->body($tree);
    }
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
//        $tree = new Tree(new CategoryModel);
//
//        return $content
//            ->header('树状模型')
//            ->body($tree);
//        $grid = new Grid(new CategoryModel());
//
//        $grid->column('category_id', __('分类id'));
//        $grid->column('category_name', __('分类名字'));
//        $grid->column('p_id', __('父级id'));
//        $grid->column('status', __('是否显示'))->display(function($is_new){
//            switch ($is_new) {
//                case '1':
//                    return '<span style="color: #00a7d0">显示</span>';
//                    break;
//
//                default:
//                    return '<span style="color: red">不显示</span>';
//                    break;
//            }
//        });
//        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(CategoryModel::findOrFail($id));

        $show->field('category_id', __('Category id'));
        $show->field('category_name', __('Category name'));
        $show->field('p_id', __('P id'));
        $show->field('is_del', __('Is del'));
        $show->field('ordernum', __('Ordernum'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {

        $form = new Form(new CategoryModel());

        $form->text('category_name', __('分类名字'));
        //$form->select('父级分类')->options('/category/json');
        $form->select('父级分类')->options(CategoryModel::selectOptions())->default(1);
        $form->switch('is_del', __('是否显示'));
        return $form;
    }
}
