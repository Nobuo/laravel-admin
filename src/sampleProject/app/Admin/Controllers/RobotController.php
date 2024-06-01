<?php

namespace App\Admin\Controllers;

use App\Models\Robot;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Grid\Exporters\CsvExporter;
use App\Admin\Extensions\CustomCsvExporter;
use App\Trait\RobotFilterTrait;
use App\Interfaces\StockServiceInterface;

class RobotController extends AdminController
{
    use RobotFilterTrait;
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Robot';

    protected $stockService;

    public function __construct(StockServiceInterface $stockService)
    {
        $this->stockService = $stockService;
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Robot());
        $grid->column('id', 'ID')->sortable();
        $grid->column('name', '名前');
        
        $this->doFilter($grid);
        // $grid->filter(function($filter){
        //     $filter->like('name', '名前');
        //     $filter->between('created_at', '登録日')->datetime();

        // });
        $grid->exporter(new CustomCsvExporter());

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Robot::findOrFail($id));
        $show->field('name', '名前');


        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Robot());
        $form->text('name', '名前');
        $this->stockService->updateStock(1, 2); 

        $form->saved(function (Form $form) {
            // 保存後に実行する処理
            $robot = $form->model();
            // 例: ログの記録
            \Log::info('Product saved', ['robot_id' => $robot->id]);
            if($robot->wasRecentlyCreated){
                \Log::info('NEW!!', ['robot_id' => $robot->id]);

            }
        });

        return $form;
    }

}
