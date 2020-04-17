<?php
$projects_keys = array(
    "name" => "Name",
    'address' => 'Address',
    'hoteladdress' => 'Hotel Address',
    'hospitaladdress' => 'Hospital Address',
    "vendor_details" => array(
        'serviceprovide' => 'Service Provider',
        'serviceNumber' => 'Number',
        'contactperson' => 'Contact Person',
        'address' => 'Address'
    ),
    'projectstart' => 'Start Date',
    'projectend' => 'End date'
);
?>
  <!DOCTYPE html>
    <html lang="en">

    <head>
        <style>
            
            <?php
$i = 0;
foreach ($res as $projects) {
    $i++;
?> 
            .project<?= $i ?> .bar{
                fill:<?= sprintf('#%06X', mt_rand(0, 0xFFFFFF)) ?>!important
            }
            <?php
}
?>
          .gantt {
                height: 100%!important;
            }
            
            .container {
                width: 80%;
                margin: 0 auto;
            }
            /* custom class */
            
            .gantt .bar-milestone .bar {
                fill: tomato;
            }
        </style>
        <?php
$this->load->view('common/style');
?>
          <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    </head>

    <body>
        <div class="contains-everything">
            <div class="overlay"></div>
            <?php
$this->load->view('common/header');
?>

                <div class="portal-body py-5">
                    <div class="careers py-5">
                        <div class="container">
                            <div class="app-portal" style="min-height: auto">
                                <div class="text-right">
                                    <div class="d-flex">
                                        <a href="<?= base_url('employee-portal') ?>" class="btn create mr-2">Back</a>
                                        <?php
if ($this->input->cookie('Login') == "true") {
?>
                                          <a href="<?= base_url('employee-portal/manage-project') ?>" class="btn create">Create new</a>
                                            <?php
}
?>
                                              <?php
$parent_btn = "";
if (!empty($parent)) {
    $parent_btn = $this->db->where('id', secure::decrypt($parent))->get('file_system')->row_array();
    $parent_btn = secure::encrypt($parent_btn['parent']);
?>
                                                  <?php
}
?>
                                  </div>
                                </div>
                            </div>
                              <?php
$res = $this->db->get('projects')->result_array();
if (!empty($res)) {
    
?>
                          <h1 class="title pt-5 mb-5">Project Tracker</h1>
                            <div class="col-md-12">
                                <div class="wraps">
                                  
                                        <div id="timeline" class=" gantt-target w-100 m-auto"></div>
                                        <div class="btn-group my-3 mx-auto w-100" role="group">
                                            <button type="button" onClick="gantt.change_view_mode('Day');add_active($(this))" class="btn btn-sm btn-light ">Day</button>
                                            <button type="button" onClick="gantt.change_view_mode('Week');add_active($(this))" class="btn btn-sm btn-light ">Week</button>
                                            <button type="button" onClick="gantt.change_view_mode('Month');add_active($(this))" class="btn btn-sm btn-light active">Month</button>
                                        </div>
                                        <script type="text/javascript">
                                            var row = new Array();
                                        </script>
                                        <div class="accordion" id="accordionExample">
                                            
                                            <?php
    $i = 1;
    foreach ($res as $projects) {
?>
                                                 
                                                <div class="card">
                                                    <div class="card-header" id="headingOne<?= $projects['id'] ?>">
                                                        <h2 class="mb-0">
                                 <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne<?= $projects['id'] ?>" aria-expanded="true" aria-controls="collapseOne<?= $projects['id'] ?>">
                                 <?= $projects['name'] ?>
                               </button>
                                  <?php
        if ($this->input->cookie('Login') == "true") {
?> 
                                  <div class="float-right">
                                   <a href="<?= base_url('employee-portal/manage-project/' . $projects['id']) ?>" class="btn"><i class="fas fa-edit"></i></a>
                                   <a href="javascript:delete_project('<?= $projects['id'] ?>')" class="btn"><i class="fas fa-trash"></i></a>
                                </div> 
                                 <?php
        }
?>
                            </h2>
                                                    </div>
                                                    <div id="collapseOne<?= $projects['id'] ?>" class="collapse pb-4" aria-labelledby="headingOne<?= $projects['id'] ?>" data-parent="#accordionExample">
                                                        <div class="col-md-12 mt-3 text-center">
                                                            <div id="timeline<?= $projects['id'] ?>" class="w-100 m-auto">
                                                            </div>
                                                        </div>
                                                        <style>
                                                            .td {
                                                                text-align: center;
                                                            }
                                                            
                                                            .wrap {
                                                                display: flex;
                                                                flex-wrap: wrap
                                                            }
                                                            
                                                            .wrap > div {
                                                                width: 48%;
                                                                margin: 1%;
                                                            }
                                                            
                                                            .card {
                                                                border: 1px solid rgba(0, 0, 0, .125)!important;
                                                            }
                                                        </style>
                                                        <script>
                                                            row.push({
                                                                id: 'project<?= $i ?>',
                                                                name: '<?= $projects['name'] ?>',
                                                                start: new Date('<?= $projects['projectstart'] ?>'),
                                                                end: new Date('<?= $projects['projectend'] ?>'),
                                                                custom_class:'project<?= $i ?>'
                                                            })
                                                        </script>
                                                        <div class="card-body">
                                                            <div class="wrapper d-flex flex-column flex-wrap pb-4">
                                                                <div class="wrap">
                                                                    <?php
        foreach ($projects as $key => $value) {
            if (isset($projects_keys[$key])) {
?>
                                                                      <div>
                                                                            <p><strong><?= $projects_keys[$key] ?></strong></p>
                                                                            <p>
                                                                                <?= $value ?>
                                                                          </p>
                                                                        </div>
                                                                        <?php
            }
        }
?>
                                                              </div>
                                                             <?php
        $test = $this->db->select('serviceprovide,serviceNumber,contactperson,address')->where('project', $projects['id'])->get('vendor')->result_array();
        if (!empty($test)) {
?>
                                                                 <div class="wrap pt-3 my-2 mt-4 mx-3">
                                                                    <strong>
                                          <h3>Additional Services</h3>
                                       </strong>
                                                                </div>
            <?php $flag =true;
            foreach ($test as $tests) { if(!$flag){
?>    <hr class="w-100"> <?php } ?>
                                                                <div class="wrap pb-4">
																	<?php  $flag =false; foreach ($tests as $key=>$value) {  ?>
                                                                      <div>
                                                                            <p><strong><?= $projects_keys['vendor_details'][$key] ?></strong></p>
                                                                            <p>
                                                                                <?= $value ?>
                                                                          </p>
                                                                        </div>
																	<?php } ?>
                                                              </div>
                                                                <?php
            }
        }
?>
                                                          </div>
                                                            <?php
        $test = $this->db->where('project', $projects['id'])->get('task')->result_array();
        if (!empty($test)) {
?>

                                                                <!--
                                 <script>
                                    var row<?= $projects['id'] ?> = new Array();
                                    <?php
            $k = 0;
            foreach ($test as $tests) {
                $k++;
?>
                                  row<?= $projects['id'] ?>.push( ['<?= $k ?>', ' <?= $tests['taskname'] ?> ', new Date('<?= $tests['taskstart'] ?>'), new Date('<?= $tests['taskend'] ?>') ])
                                    <?php
            }
?>
                                      google.charts.load('current', {'packages':['timeline']});
                                         google.charts.setOnLoadCallback(function(){
                                         var container = document.getElementById('timeline<?= $projects['id'] ?>');
                                         var chart = new google.visualization.Timeline(container);
                                         var dataTable = new google.visualization.DataTable();
                                         dataTable.addColumn({ type: 'string', id: 'Serial' });
                                         dataTable.addColumn({ type: 'string', id: 'Task' });
                                         dataTable.addColumn({ type: 'date', id: 'Start' });
                                         dataTable.addColumn({ type: 'date', id: 'End' });
                                         dataTable.addRows(row<?= $projects['id'] ?>);
                                        var options = {  hAxis: {minValue: new Date('<?= $projects['projectstart'] ?>'), maxValue: new Date('<?= $projects['projectend'] ?>')
                                        },
                                       timeline: { showRowLabels: false }
                                     };

                                     chart.draw(dataTable, options);
                                    });
                                 </script>
-->
                                                                <?php
        }
?>
                                                      </div>
                                                    </div>
                                                </div>
                                                <?php
        $i++;
    }
?>
                                      </div>
                                        
                                    <style>
            
                                             <?php
    $i = 0;
    foreach ($res as $projects) {
        $i++;
?> 
                                            .project<?= $i ?> .bar{
                                            fill:<?= sprintf('#%06X', mt_rand(0, 0xFFFFFF)) ?> !important
                                              }
                                            <?php
    }
?>
                                              </style>
                                </div>
                            </div>
                            <?php
}
?>
                      </div>
                    </div>

                </div>
                <?php
$this->load->view('common/footer');
?>
      </div>
        <?php
$this->load->view('common/end');
?>
          <link rel="stylesheet" href="<?= base_url('assets/') ?>dist/frappe-gantt.css" />
            <script src="<?= base_url('assets/') ?>dist/frappe-gantt.js"></script>
            <script>
                <?php
if (!empty($res)) {
?>
              var gantt = new Gantt(".gantt-target", row, {
                    on_click: function(task) {
                        console.log(task);
                    },
                    on_date_change: function(task, start, end) {
                        console.log(task, start, end);
                    },
                    on_progress_change: function(task, progress) {
                        console.log(task, progress);
                    },
                    on_view_change: function(mode) {
                        console.log(mode);
                    },
                    view_mode: 'Month',
                    language: 'en'
                });
                <?php
}
?>
              // Datepicker 
                $('select').selectpicker();
                $(document).on('focus', ".datepicker_recurring_start", function() {
                    $(this).datepicker({
                        dateFormat: "mm/dd/yy",
                        duration: "fast",
                        changeYear: true,
                        changeMonth: true,
                        yearRange: "2019:2020"
                    });
                });
                init_date();
                make_required();

                function make_required() {
                    $('.all-tasks .form-row:last-child input').attr('required', true);
                }

                function init_date() {
                    $(".datepicker").datepicker({
                        dateFormat: "mm/dd/yy",
                        duration: "fast",
                        changeYear: true,
                        yearRange: "2019:2020"
                    });
                }

                function add_project() {
                    var btn = $('#project button');
                    var html = btn.html();
                    var data = $('#project').serialize();
                    btn.html("Processing");
                    $.ajax({
                        type: 'POST',
                        url: '<?= base_url('site/create_project_process') ?>',
                        data: data,
                        dataType: "json",
                        success: function(data) {
                            btn.html(html);
                            if (data.error == 1) {
                                alertit("Operation done", 'success')
                                setTimeout(function() {
                                    window.location.href = window.base_url + "employee-portal/project-tracker"
                                }, 2000);
                            } else {
                                alertit(data.msg, 'danger')
                            }
                        }
                    });
                }

                function delete_project(id) {
                    if (confirm('You sure you want to delete this project?')) {
                        $.ajax({
                            type: 'POST',
                            url: '<?= base_url('site/delete_project') ?>',
                            data: {
                                id: id
                            },
                            dataType: "json",
                            success: function(data) {
                                if (data.error == 1) {
                                    alertit("Operation done", 'success')
                                    setTimeout(function() {
                                        window.location.reload();
                                    }, 2000);
                                } else {
                                    alertit(data.msg, 'danger')
                                }
                            }
                        });
                    }
                }
                $('#accordionExample').click(function() {
                    $("#accordionExample div[dir='ltr']").css('width', 'auto');
                });
                function add_active(obj){
                    $('.active').removeClass('active');
                    $(obj).addClass('active');
                }
                $('svg.gantt').attr('height',parseInt($('rect.grid-background').attr('height'))+30);
				$('.employee_portal_link').addClass('active')
            </script>
    </body>