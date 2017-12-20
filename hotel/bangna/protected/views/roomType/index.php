<?php
/* @var $this RoomTypeController */
/* @var $dataProvider CActiveDataProvider */

?>

<div ng-controller="RoomTypeController as r" >
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-8">
                <a href="#/roomtype/create/<?php echo @$_GET['id']; ?>"
                   id="create"
                   class="btn btn-default mt0 width-64px"
                   data-value="<?php echo @$_GET['id']; ?>"
                   data-toggle="modal"
                   data-target="#modal-fullscreen"
                    ng-click="r.btnAdd();">
                    <i class="fa fa-plus"></i>
                    &nbsp;เพิ่ม
                </a>
            </div>
            <div class="col-xs-8">&nbsp;</div>
        </div>
    </div>

    <div class="container-fluid">

        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>ประเภทห้อง</h2>
                        <div class="panel-ctrls" style="line-height: normal;">
                            <i class="separator pull-left"></i>
                            <div id="DataTables_Table_0_filter" class="dataTables_filter pull-left">
                                <label class="panel-ctrls-center">
                                    <input type="search"
                                           class="form-control"
                                           placeholder="ค้นหาข้อมูล"
                                           aria-controls="DataTables_Table_0"
                                           ng-model="search">
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- content -->
                    <div class="panel-body panel-no-padding">
                        <table id="example"
                               class="table table-condensed table-bordered table-hover dataTable no-footer"
                               cellspacing="0"
                               width="100%">
                            <thead>
                                <tr role="row">
                                    <th class="text-center sorting"
                                        ng-click="r.sort('name');">
                                        ชื่อ

                                        <span class="glyphicon sort-icon"
                                              ng-show="r.sortKey=='name'"
                                              ng-class="{'glyphicon-chevron-up':r.reverse,'glyphicon-chevron-down':!r.reverse}">
                                        </span>
                                    </th>
                                    <th class="text-center sorting"
                                        ng-click="r.sort('price');">
                                        ราคา

                                        <span class="glyphicon sort-icon"
                                              ng-show="r.sortKey=='price'"
                                              ng-class="{'glyphicon-chevron-up':r.reverse,'glyphicon-chevron-down':!r.reverse}">
                                            </span>
                                    </th>
                                    <th class="text-center none-sorting">
                                        หมายเหต
                                    </th>
                                    <th class="text-center sorting"
                                        ng-click="r.sort('created');">
                                        เพิ่มเมื่อ

                                        <span class="glyphicon sort-icon"
                                              ng-show="r.sortKey=='created'"
                                              ng-class="{'glyphicon-chevron-up':r.reverse,'glyphicon-chevron-down':!r.reverse}">
                                        </span>
                                    </th>
                                    <th class="text-center sorting"
                                        ng-click="r.sort('updated');">
                                        แก้ไขเมื่อ

                                        <span class="glyphicon sort-icon"
                                              ng-show="r.sortKey=='updated'"
                                              ng-class="{'glyphicon-chevron-up':r.reverse,'glyphicon-chevron-down':!r.reverse}">
                                        </span>
                                    </th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr dir-paginate="list in r.roomTypeList | orderBy:r.sortKey:r.reverse | filter:search | itemsPerPage:10">
                                    <td >{{list.name}}</td >
                                    <td class="text-center" >{{list.price | currency:'':0}}</td >
                                    <td >{{list.remark}}</td >
                                    <td >
                                        {{list.created}}
                                        <div class="text-right" >
                                            <a href="#" >
                                                {{list.created_by}}
                                            </a >
                                        </div >
                                    </td >
                                    <td >
                                        {{list.updated}}
                                        <div class="text-right" >
                                            <a href="#/"
                                               class="updated-by"
                                                ng-model="r.updatedby"
                                               data-value="{{list.updated_by}}">
                                                {{ list.updated_by }}
                                            </a >
                                        </div >
                                    </td >
                                    <td class="col-xs-1">
                                        <div class="btn-group btn-group-justified">
                                            <a href="#/roomtype/update"
                                               class="btn btn-default item-edit-btn"
                                               data-id="{{list.id}}"
                                               data-toggle="modal"
                                               data-target="#modal-fullscreen"
                                                ng-click="r.btnUpdate(list.id, list.name);">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="#"
                                               class="btn btn-default item-remove-btn"
                                               data-id="{{list.id}}"
                                               data-toggle="modal" data-target="#delete"
                                                ng-click="r.btnDelete(list.id,list.name);">
                                                <i class="fa fa-remove"></i>
                                            </a>
                                        </div>
                                    </td >
                                </tr >
                            </tbody>
                        </table>
                    </div>

                    <!-- footer -->
                    <div class="panel-body has-pagination p">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">
                                    &nbsp; <!--  pagenumber to  number -->
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="pull-right">
                                    <dir-pagination-controls
                                        max-size="5"
                                        direction-links="true"
                                        boundary-links="true">
                                    </dir-pagination-controls>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end footer -->
                </div>
            </div>
        </div>
    </div>


    <!-- Modal event click button delete or remove -->
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-body">
                    <div class="bootbox-body">
                        <p>
                            <i class="fa fa-remove"></i>
                            ลบ
                            <b>
                                <span class="text-info">ประเภทห้อง</span>
                                <span class="text-danger">'{{r.roomTypeName}}'</span>
                                <small class="text-muted">สาขา '<?php echo @$_SESSION['branch']; ?>'</small>
                            </b>

                        </p>
                        <p class="">
                            คุณแน่ใจแล้ว
                            <strong class="text-primary">ใช่</strong> หรือ
                            <strong class="text-danger">ไม่</strong> ?
                        </p>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button"
                            class="btn btn-primary"
                            ng-click="r.confirmDelete(r.roomTypeId);"
                            data-dismiss="modal">
                        ตกลง
                    </button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
                </div>

            </div>
        </div>
    </div>


    <!-- Modal fullscreen -->
    <div class="modal modal-fullscreen fade in" id="modal-fullscreen" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <ng-view></ng-view>
        </div>
    </div>


</div>

