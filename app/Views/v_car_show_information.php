<!--
* v_car_show_information
* Display car detail page
* @input    car information
* @output   car detail page
* @author   Warisara
* @Create Date  2564-08-12
*/
-->

<style>
    @media (min-width: 1200px) {
        .container-sm {
            max-width: 900px;
        }
    }

    .upload-file {
        background-color: #eeeee4;
        border: none;
        color: black;
        border-radius: 8px;
        font-size: 14px;
        padding: 8px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
    }

    .input-image {
        height: 0;
        width: 0;
        left: 0;
        top: 0;
        opacity: 0;
        cursor: pointer;
    }

    #file_name {
        display: block;
        /* or inline-block */
        text-overflow: ellipsis;
        word-wrap: break-word;
        overflow: hidden;
        max-height: 100%;
        line-height: 1.5em;
        margin-top: 10;
    }

    .picture-container {
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 50%;
    }

    .picture {
        width: 200px;
        height: 200px;
        background-color: #999999;
        border: 4px solid #CCCCCC;
        color: #FFFFFF;
        border-radius: 50%;
        margin: auto;
        overflow: hidden;
        transition: all 0.2s;
        -webkit-transition: all 0.2s;
        text-align: center;
    }

    .cl-blue {
        color: #1244B9 !important;
    }
</style>
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
        <div class="page-inner">
            <div class="pl-4 mt-4 page-header mb-0">
                <h4 class="pl-3 page-title">CAR DETAIL</h4>
                <div class="card-action ml-auto mr-4">
                    <a class="ui yellow button" href="<?php echo base_url() . '/Car_edit/car_edit/' . $arr_car[0]->car_id ?>">
                        <i class="far fa-edit mr-1"></i>
                        Edit info
                    </a>
                    <button type="submit" class="ui red test button">
                        <i class="trash icon m-0"></i>
                        <i class="align left icon mr-1"></i>
                        Delete
                    </button>
                </div>
            </div>

                <hr width="95%" color="696969">
                <ul class="pl-2 mr-5 breadcrumbs d-flex align-items-left align-items-md-center" style="height: 30px;">
                    <li class="nav-home">
                        <a href="<?php echo base_url() . '/Dashboard/dashboard_show'?>">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a class="cl-blue" href="<?php echo base_url() . '/Car_show/car_show_ajax'?>">Car information</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Car details</a>
                    </li>
                </ul>
            </div>

            <div class="row mx-4">
                <div class="col-12">
                    <div class="picture-container">
                        <div class="picture">
                            <img class="avatar-img rounded-circle" src="<?php echo base_url() . '/car_image/' . $arr_car[0]->car_image ?>">
                        </div>
                    </div><br>

                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Car Information</div>
                        </div>

                        <!-- Car Information-->
                        <div class="card-body">
                            <?php
                            require_once dirname(__FILE__) . '/card/car_card.php';
                            ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="ui modal">
                <i class="close icon"></i>
                <div class="header">
                    Remove car ?
                </div>
                <div class="content">
                    <form action="<?php echo base_url() . '/Car_show/car_delete' ?>" method="post">
                        <input type="hidden" id="car_id" name="car_id" value="<?php echo $arr_car[0]->car_id ?>">

                        <p style=" font-size: 1rem">Are you sure to remove the car</p>

                        <div class="ui info message">
                            <div class="header">
                                What happening after remove the agent
                            </div>
                            <ul class="list">
                                <li>The car still ramain in database,</li>
                                <li>But you cannot see the car anymore</li>
                            </ul>
                        </div>
                </div>
                <div class="actions">
                    <button type="button" class="ui test button">
                        No, keep it
                    </button>
                    <button type="submit" class="ui negative right labeled icon button">
                        Yes, remove it
                        <i class="minus circle icon"></i>
                    </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('.ui.modal').modal('attach events', '.test.button', 'toggle');

    <!--
    /*
    * get_image
    * show image name
    * @input    -
    * @output   show image name
    * @author   Warisara
    * @Create Date  2564-08-12
    */
    -->
    function get_image() {
        var car_image = $('#car_image').val();
        $('#file_name').html(car_image.substr(12));
        $('#car_image-error').remove();
        $('#old_car_image').remove();
    }

    <!--
    /*
    * get_id
    * get car_id and show in remove car modal
    * @input    -
    * @output   get car_id and show in remove car modal
    * @author   Warisara
    * @Create Date  2564-08-12
    */
    -->
    function get_id(car_id) {
        $('#car_id').val(car_id);
    }
</script>
