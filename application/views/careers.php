<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('common/style') ?>
</head>
<body>
<style>
	hr{
		height: 1px!important;
		width: 100%!important;
	}
</style>
    <div class="contains-everything">

        <div class="overlay"></div>

        <?php $this->load->view('common/header') ?>
        <div class="bg-img"><img src="<?=base_url()?>assets/images/linco-03.png" alt="Guiding Principles"></div>

        <div class="careers py-5">
            <div class="container">
                <h1 class="title pt-5 mb-5">Careers</h1>
                <p class="pb-5">Our mission is simple, to be of value to our clients and provide a reliable service. We accomplish this mission by selective hiring practices and following our eleven Guiding Principles. We pride ourselves on providing a stable work environment where employees have a career, not job. We have open discussions daily where every voice is heard. Our success is derived and driven by our team structure.</p>
                <div class="row">
                    <div class="col-md-12">
                        <div class="wrap">
                            <div class="text-center button">
                                <button class="btn careers-btn">Apply Now <i class="fas fa-angle-down"></i></button>
                            </div>
                            <form class="careers-form pt-5 off" id="career_form" onSubmit="validate_form();return false">
                                <div class="text-center">
                                    <h3 class="mb-5">General Information</h3>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="name">First Name:</label>
                                        <input type="text" required class="form-control" name="name" id="name" placeholder="i.e John Doe">
                                    </div>
									<div class="form-group col-md-4">
                                        <label for="name1">Last Name:</label>
                                        <input type="text" required class="form-control" name="last_name" id="name1" placeholder="i.e John Doe">
                                    </div>
									<div class="form-group col-md-4">
                                        <label for="name2">City:</label>
                                        <input type="text" required class="form-control" name="city_name" id="name2" placeholder="i.e John Doe">
                                    </div>
									<div class="form-group col-md-4">
                                        <label for="name3">State:</label>
                                        <input type="text" required class="form-control" name="state_name" id="name3" placeholder="i.e John Doe">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="ssn">Social Security No:</label>
                                        <input name="ssn" required type="text" class="form-control txtnumber2" maxlength="15" id="ssn" placeholder="i.e 444.444.4444">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <div class="date text-left">
                                            <div class="wrapper">
                                                <label for="datepicker" class="p-0">
                                                    <span class="d-block">Date of Birth:</span>
                                                    <input required name="dob" type="text" class="datepicker d-block form-control"
                                                        autocomplete="off" id="dob" placeholder="i.e 10/17/1994">
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="phone">Telephone:</label>
                                        <input type="text" name="phone" required  maxlength="12" class="form-control txtnumber2" id="phone" placeholder="i.e 251.621.5555">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="alternate">Alternate Phone:</label>
                                        <input type="text"  name="alternatephone" required  maxlength="12" class="form-control txtnumber2" id="alternate" placeholder="i.e 251.621.5555">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="driving_license">Driver’s License No:</label>
                                        <input type="text" required name="license" class="form-control" id="driving_license" placeholder="i.e xxxx – xxx – xx – xxx – x">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="license_state">State of License Issuance:</label>
                                        <input type="text" required name="state" class="form-control" id="license_state" placeholder="Louisiana">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="current_address">Current Address:</label>
                                        <input type="text" required name="current_address" class="form-control" id="current_address" placeholder="i.e Ms Alice Smith Apartment 1c 213 Derrick Street Boston, MA 02130">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="previous_address">Previous Address:</label>
                                        <input type="text" required name="previous_address" class="form-control" id="previous_address" placeholder="i.e Ms Alice Smith Apartment 1c 213 Derrick Street Boston, MA 02130">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="citizenship">Are you a U.S. Citizen?</label>
                                        <select name="citizen" required class="selectpicker show-menu-arrow d-block w-100" id="citizenship">
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="applying_position">Position Applying For:</label>
                                        <input name="position" required type="text" class="form-control" id="applying_position" placeholder="i.e Construction worker">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="expected_pay">What pay rate do you expect?</label>
                                        <input name="pay_expectations" min="10" required type="number" class="form-control" id="expected_pay" placeholder="i.e 100">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="travel">Are you willing to travel out of state to work?</label>
                                        <select name="willing_to_travel" required class="selectpicker show-menu-arrow d-block w-100" id="travel">
                                           <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="transportation">Do you have transportation to the job site?</label>
                                        <select name="have_transportation" required class="selectpicker show-menu-arrow d-block w-100" id="transportation">
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                </div>
								<div class="toggle-section">
                                    <div class="form-group">
                                        <label for="arrest-toggle">Have you ever been arrested?</label>
                                        <div class="toggle-button-cover">
                                            <div class="button-cover">
                                                <div class="button r">
                                                    <input name="arrested"  type="checkbox" class="checkbox" id="arrest-toggle" value="yes">
                                                    <div class="knobs"></div>
                                                    <div class="layer"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="arrest_tab toggle-off">
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="arrest_reason"> what for? (Explain)</label>
                                        <input  type="text" class="form-control" id="arrest_reason" name="arrest_reason"  placeholder="Explain in few words the reason of your arrest">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="conviction">Have you ever been convicted of a misdemeanor or
                                            felony?</label>
                                        <select  name="conviction" class="selectpicker show-menu-arrow d-block w-100" id="conviction">
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="conviction_reason">If so, what was the conviction? (Explain)</label>
                                        <input  name="conviction_explain" type="text" class="form-control" id="conviction_reason" placeholder="Explain in few words reason of your conviction">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="probation">Is there sentencing or probation that you still currently
                                            serving?</label>
                                        <select  name="pending_sentence" class="selectpicker show-menu-arrow d-block w-100" id="probation">
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="probation_terms">Explain:</label>
                                        <input  name="pending_sentence_explain" type="text" class="form-control" id="probation_terms" placeholder="Explain in few words about your sentence/probation">
                                    </div>
                                </div>
								</div>	
                                <div class="toggle-section">
                                    <div class="form-group">
                                        <label for="military-toggle">Did you serve in the military?</label>
                                        <div class="toggle-button-cover">
                                            <div class="button-cover">
                                                <div class="button r">
                                                    <input name="military" type="checkbox" class="checkbox" id="military-toggle">
                                                    <div class="knobs"></div>
                                                    <div class="layer"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>                                
                                <div class="form-row military-tab toggle-off">
                                    <!-- Military -->
                                    <div class="form-group col-md-12">
                                        <div class="text-center">
                                            <h3 class="mt-3 mb-4">Military Service Record</h3>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <div class="date text-left">
                                            <div class="wrapper">
                                                <label for="datepicker" class="p-0">
                                                    <span class="d-block">Date Entered Service:</span>
                                                    <input name="military_enter" type="text" class="datepicker d-block form-control"
                                                        autocomplete="off" placeholder="i.e 10/17/1994">
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <div class="date text-left">
                                            <div class="wrapper">
                                                <label for="datepicker" class="p-0">
                                                    <span class="d-block">Date of Discharge:</span>
                                                    <input name ="military_discharge" type="text" class="datepicker d-block form-control"
                                                        autocomplete="off" placeholder="i.e 10/17/1994">
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="discharge">Class of Discharge</label>
                                        <input name="military_class" type="text" class="form-control" id="discharge" placeholder="General Discharge">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="service_branch">Branch of Service</label>
                                        <input name="branch_class" type="text" class="form-control" id="service_branch" placeholder="i.e Army">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="highest_rank">Highest Rank</label>
                                        <input name="military_rank" type="text" class="form-control" id="highest_rank" placeholder="i.e Sergeant Major">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="service_no">Service No</label>
                                        <input name="military_service_no" type="text" class="form-control" id="service_no" placeholder="i.e 12-345-678">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="duty">Describe any duty remaining</label>
                                        <input name="military_duty_remaining" type="text" class="notrequired form-control" id="duty" placeholder="explain in few words of the duty remaining">
                                    </div>
                                </div>
                                <div class="text-center">
                                    <h3 class="my-5">Education</h3>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="hight_school">Name of High School Attended:</label>
                                        <input name="highschool" required type="text" class="form-control" id="hight_school" placeholder="i.e Louisiana City High School">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="school_graduate">Did you Graduate?</label>
                                        <select name="graduate" required class="selectpicker show-menu-arrow d-block w-100" id="school_graduate">
                                           <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <div class="date text-left">
                                            <div class="wrapper">
                                                <label for="datepicker" class="p-0">
                                                    <span class="d-block">Year Graduated:</span>
                                                    <input name="year_of_graduation" required type="text" class="datepicker d-block form-control"
                                                        autocomplete="off" placeholder="i.e 10/17/1994">
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="last_grade">Last Grade Completed:</label>
                                        <input name="last_grade_completed" required type="text" class="form-control" id="last_grade" placeholder="i.e 12">
                                    </div>
                                </div>
                                <div class="toggle-section">
                                    <div class="form-group">
                                        <label for="college-toggle">Did you graduate college?</label>
                                        <div class="toggle-button-cover">
                                            <div class="button-cover">
                                                <div class="button r">
                                                    <input name="college_graduate"  type="checkbox" class="checkbox" id="college-toggle" value="yes">
                                                    <div class="knobs"></div>
                                                    <div class="layer"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>     
                                <div class="form-row college-tab toggle-off">
                                    <div class="form-group col-md-4">
                                        <label for="college_name">Name of College Attended:</label>
                                        <input name="college_graduate_name" type="text" class="form-control" id="college_name" placeholder="i.e Louisiana state university">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="college_graduate">Did you Graduate?</label>
                                        <select name="college_graduate_graduate" class="selectpicker show-menu-arrow d-block w-100" id="college_graduate">
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <div class="date text-left">
                                            <div class="wrapper">
                                                <label for="datepicker" class="p-0">
                                                    <span class="d-block">Year Graduated:</span>
                                                    <input name="college_graduate_year" type="text" class="datepicker d-block form-control"
                                                        autocomplete="off" placeholder="i.e 10/17/1994">
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="degree_received">Degree Received:</label>
                                        <input type="text" name="college_graduate_degree" class="form-control" id="degree_received" placeholder="i.e undergraduate bachelor's degree">
                                    </div>
                                </div>
                                <div class="toggle-section">
                                    <div class="form-group">
                                        <label for="business-toggle">Do you have business degree?</label>
                                        <div class="toggle-button-cover">
                                            <div class="button-cover">
                                                <div class="button r">
                                                    <input name="business_degree" type="checkbox" class="checkbox" id="business-toggle" value="yes">
                                                    <div class="knobs"></div>
                                                    <div class="layer"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                                <div class="form-row business-tab toggle-off">
                                    <div class="form-group col-md-4">
                                        <label for="business_school">Name of Business or Trade School Attended:</label>
                                        <input type="text" name="business_school_name" class="form-control" id="business_school" placeholder="i.e Louisiana state university">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="business_graduate">Did you Graduate?</label>
                                        <select name="business_school_graduate" class="selectpicker show-menu-arrow d-block w-100" id="business_graduate">
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <div class="date text-left">
                                            <div class="wrapper">
                                                <label for="datepicker" class="p-0">
                                                    <span class="d-block">Year Graduated:</span>
                                                    <input name="business_school_year" type="text" class="datepicker d-block form-control"
                                                        autocomplete="off" placeholder="i.e 10/17/1994">
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="degree_received_business">Degree Received:</label>
                                        <input type="text" name="business_school_degree" class="form-control" id="degree_received_business" placeholder="i.e Accounting major">
                                    </div>
                                </div>
								<div class="work_history_tab ">	
								<div class="text-center">
                                    <h3 class="mb-5">List Your Last Three Employers</h3>
                                </div>	
								<div class="d-none work_history">
								<div class="form-row">	
									<hr>
                                    <div class="form-group col-md-4">
                                        <label for="company_name">Company Name:</label>
                                        <input type="text" name="work_company_name[]" class="form-control"  placeholder="i.e linco construction">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="employed_date">Date Employed:</label>
                                        <input type="text" name="date_employed[]" class="form-control datepicker"  placeholder="i.e 10/17/1994">
                                    </div>
									<div class="form-group col-md-4">
                                        <label for="employed_date_leave">Date Left:</label>
                                        <input type="text" name="date_left[]" class="form-control datepicker" id="employed_date_leave" placeholder="i.e 10/17/1994">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="company_address">Company Address:</label>
                                        <input type="text" name="company_address[]" class="form-control"  placeholder="i.e 1c 213 Derrick Street Boston, MA 02130">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="work_type">Type of Work:</label>
                                        <input type="text" name="work_type[]" class="form-control" placeholder="i.e Construction Expeditor">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="supervisor_name">Name of Supervisor:</label>
                                        <input type="text" name="supervisor_name[]" class="form-control" placeholder="i.e John Doe">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="job_duty_start">Job Duties At Start:</label>
                                        <input type="text" name="job_duties_start[]" class="form-control"  placeholder="i.e Construction Worker">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="job_duty_leave">Job Duties At Leaving:</label>
                                        <input type="text"  name="job_duties_leave[]"  class="form-control"  placeholder="i.e Construction Expeditor">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="start_wage">Wages At Start:</label>
                                        <input type="number" min="10"  name="wages_at_start[]"  class="form-control"  placeholder="i.e 65">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="leave_wage">Wages At Leaving:</label>
                                        <input type="number" min="10" name="wages_at_end[]"  class="form-control" placeholder="i.e 100">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="leaving_reason">Reason For Leaving:</label>
                                        <input type="text" name="reason_for_leaving[]" class="form-control"  placeholder="explain in few words, reason for leaving">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="supervisory_position">Any Supervisory Position Held?</label>
                                        <select name="supervisory_position[]" style="height: 45px"  class="form-control show-menu-arrow d-block w-100" >
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="explain">Explain</label>
                                        <input type="text" name="explain[]" class="form-control" id="explain" placeholder="Explain about the supervisor position held by you">
                                    </div>
									<div class="form-group col-md-8" style="margin-top: 25px;">
                                       <button type="button" class="btn float-right button_remove_job" onClick="$(this).parent('div').parent('div').remove();$('#button_work_history').attr('count',parseInt($('#button_work_history').attr('count'))+1);$('#button_work_history').show()">Remove Section</button>
                                    </div>
                                </div>
                                </div>	
								<div class="work_history_wrap">	
								<div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="company_name">Company Name:</label>
                                        <input type="text" name="work_company_name[]" class="form-control" id="company_name" placeholder="i.e linco construction">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="employed_date">Date Employed:</label>
                                        <input type="text" name="date_employed[]" class="form-control datepicker" id="employed_date" placeholder="i.e 10/17/1994">
                                    </div>
									<div class="form-group col-md-4">
                                        <label for="employed_date_leave">Date Left:</label>
                                        <input type="text" name="date_left[]" class="form-control datepicker" id="employed_date_leave" placeholder="i.e 10/17/1994">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="company_address">Company Address:</label>
                                        <input type="text" name="company_address[]" class="form-control" id="company_address" placeholder="i.e 1c 213 Derrick Street Boston, MA 02130">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="work_type">Type of Work:</label>
                                        <input type="text" name="work_type[]" class="form-control" id="work_type" placeholder="i.e Construction Expeditor">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="supervisor_name">Name of Supervisor:</label>
                                        <input type="text" name="supervisor_name[]" class="form-control" id="supervisor_name" placeholder="i.e John Doe">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="job_duty_start">Job Duties At Start:</label>
                                        <input type="text" name="job_duties_start[]" class="form-control" id="job_duty_start" placeholder="i.e Construction Worker">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="job_duty_leave">Job Duties At Leaving:</label>
                                        <input type="text"  name="job_duties_leave[]"  class="form-control" id="job_duty_leave" placeholder="i.e Construction Expeditor">
                                    </div>
                                   <div class="form-group col-md-4">
                                        <label for="start_wage">Wages At Start:</label>
                                        <input type="number" min="10"  name="wages_at_start[]"  class="form-control"  placeholder="i.e 65">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="leave_wage">Wages At Leaving:</label>
                                        <input type="number" min="10" name="wages_at_end[]"  class="form-control" placeholder="i.e 100">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="leaving_reason">Reason For Leaving:</label>
                                        <input type="text" name="reason_for_leaving[]" class="form-control" id="leaving_reason" placeholder="explain in few words, reason for leaving">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="supervisory_position">Any Supervisory Position Held?</label>
                                        <select name="supervisory_position[]" style="height: 45px"  class="form-control show-menu-arrow d-block w-100" >
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="explain">Explain</label>
                                        <input type="text" name="explain[]" class="form-control" placeholder="Explain about the supervisor position held by you">
                                    </div>
                                </div>	
								</div>	
								<div class="form-group col-md-12 add-company add-section">
                                        <div class="text-right">
                                            <button class="btn" id="button_work_history" onClick="$('.work_history_wrap').append($('.work_history').html());$(this).attr('count',parseInt($(this).attr('count'))-1);if(parseInt($(this).attr('count'))<1){$(this).hide()}init_date();" type="button" count = "2" style="font-size: 18px; "><strong>Next</strong></button>
                                        </div>
                                    </div>
								</div>
                                <div class="text-center">
                                    <h3 class="mb-5">Construction Experience</h3>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="construction_site">Have you ever worked on a construction site?</label>
                                        <select name="construction_experience"  required class="selectpicker show-menu-arrow d-block w-100" id="construction_site">
                                           <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="experience_work">If so, what is your experience?</label>
                                        <input name ="construction_experience_explain" required type="text" class="form-control" id="experience_work" placeholder="Describe in few words">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="trade_certifications">Do you have any trade certifications? (List)</label>
                                        <input placeholder="Enter all certifications seprated by comma(,)" required  name ="tradecertification"  class="form-control" id="trade_certifications">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="safety_training">Do you have any safety training certifications?</label>
                                         <input placeholder="Enter all certifications seprated by comma(,)" required multiple name ="safety_training"  class="form-control" id="safety_training"/>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="skills">Please check any of the following skills that you currently have:</label>
										 <select required multiple name="skills" data-role="tagsinput" class="selectpicker show-menu-arrow d-block w-100" id="skills">
                                           <option value="Supervisor of construction crew">Supervisor of construction crew</option>
                                           <option value="Layout/Leadmad">Layout/Leadmad</option>
                                           <option value="Millwright">Millwright</option>
                                           <option value="Metal Building Erection">Metal Building Erection</option>
                                           <option value="Steel Erection">Steel Erection</option>
                                           <option value="Torch man">Torch man</option>
                                           <option value="Concrete Finisher and/or Rod buster">Concrete Finisher and/or Rod buster</option>
                                           <option value="Demolition">Demolition</option>
                                           <option value="Carpentry">Carpentry</option>
                                           <option value="Blue print Reading">Blue print Reading</option>
                                           <option value="Laser Level">Laser Level</option>
                                           <option value="Laser Alignment">Laser Alignment</option>
                                           <option value="Welding">Welding</option>
                                        </select>
                                    </div>
                                </div>
								<div class="reference-tab">
								<div class="text-center">
                                    <h3 class="mb-5">List Three References</h3>

                                </div>	
								<div id="refrence_div" class="d-none">
									<div class="form-row reference">
									<hr>
									 <div class="form-group col-md-4">
                                        <label for="reference_name">Name</label>
                                        <input  type="text" name="refrence_name[]" class="form-control" placeholder="i.e John Doe">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="reference_occupation">Occupation</label>
                                        <input type="text" name="refrence_occupation[]" class="form-control"  placeholder="i.e Supervisor">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="reference_phone">Phone</label>
                                        <input type="text" name="refrence_phone[]" class="form-control txtnumber2"  placeholder="i.e 251.621.5555">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="reference_address">Address</label>
                                        <input type="text" name="refrence_address[]" class="form-control"  placeholder="i.e Ms Alice Smith Apartment 1c 213 Derrick Street Boston, MA 02130">
                                    </div>
									<div class="text-right w-100 form-group col-md-8" style="margin-top: 25px;">	
									<button class="btn btn-career float-right" type="button" onClick="$(this).parent('div').parent('div').remove(); $('#add-refrence-button').attr('count',parseInt($('#add-refrence-button').attr('count'))+1);$('#add-refrence-button').show()">Remove Section</button>	
									</div>	
									</div>
								</div>
								<div class="refrence-div-wrap">	
                               
								
                                <div class="form-row reference ">
                                    <div class="form-group col-md-4">
                                        <label for="reference_name">Name</label>
                                        <input type="text" name="refrence_name[]" class="form-control" id="reference_name" placeholder="i.e John Doe">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="reference_occupation">Occupation</label>
                                        <input type="text" name="refrence_occupation[]" class="form-control" id="reference_occupation" placeholder="i.e Supervisor">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="reference_phone">Phone</label>
                                        <input type="text" name="refrence_phone[]" maxlength="12" class="form-control txtnumber2" id="reference_phone" placeholder="i.e 251.621.5555">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="reference_address">Address</label>
                                        <input type="text" name="refrence_address[]" class="form-control"  placeholder="i.e Ms Alice Smith Apartment 1c 213 Derrick Street Boston, MA 02130">
                                    </div>
                                </div>
								</div>	
                                <div class="form-group add-reference add-section">
                                    <div class="text-right">
                                        <button class="btn" id="add-refrence-button" type="button" onClick="$('.refrence-div-wrap').append($('#refrence_div').html()); $(this).attr('count',parseInt($(this).attr('count'))-1);if(parseInt($(this).attr('count'))<1){$(this).hide()};init_date();" count="2" style="font-size: 18px; "><strong>Next</strong></button>
                                    </div>									
                                </div>
								</div>	
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <div class="d-flex justify-content-start align-items-center">
                                            <input type="checkbox" name="agreement" value="yes" class="form-control drug-check" id="reference_address" style="width: 20px;">
                                            <label for="reference_address" class="pb-0 pl-1">I have read, understand, and agree to the Linco, LLC drug policy and hereby consent to required company drug testing. <a class="custom-pop-open">Drug Policy</a></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-right w-100 form-group mt-2">
                                    <button type="submit" id="career_form_submit" class="btn submit application-btn off">Complete Application</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="job-listing mb-5 py-5">
            <div class="container">
                <div class="row row-eq-height">
                    <div class="col-lg-12 col-md-12">
                        <div class="wrap p-5 mb-4">
                            <div class="wrap-box">
                                <h4 class="mb-3">Crane Operator</h4>
                                <p class="pb-2"><strong>Description:</strong> Do not apply if you do not have crane operator experience. Do not apply if you only have

commercial or carpentry experience. Must have prior industrial construction experience. Hiring is for the

skilled craft of crane operation of rough terrain cranes ranging from 18T-80T with prior training and

operating experience required. Skills: Must have a valid driver’s license and/or available transportation to

current local and out of state jobs in the Southeast. Per diem is paid for travel. Duties: under the direction

of an experienced supervisor as needed for crane operation for lifting structural steel and equipment

setting.</p>
                                    
<p>This employer wants to be contacted as follows
<ol>
<li>By email to lindsbm1@gmail.com (mailto:lindsbm1@gmail.com)</li>

<li>Through recruiter:

You may apply for this job through the Jackson Affiliate Career Center at 205 Walker Springs Road

Jackson , AL ( 251-246-2453 )
</li>
<li>Special Instructions:

Key referral and email resume to lindsbm1@gmail.com
</li>	
</ol>
</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="wrap p-5 mb-4">
                            <div class="wrap-box">
                                <h4 class="mb-3">Experienced Welder</h4>
                                <p class="pb-2"><strong>Description:</strong>Do not apply if you do not have welding experience. Do not apply if you only have

commercial or carpentry experience. Must have prior industrial construction experience. Hiring is for the

skilled craft of welding E7018 SMAW (stick). Skills: Must have a valid driver’s license and/or available

transportation to current jobs in Alabama and Georgia. Per diem is paid for travel. Duties: Work under

the direction of an experienced supervisor as needed for welding of A36 structural steel.</p>
								<p><strong>Essential Talents</strong>
<ol>
<li>Read specifications or blueprints to determine the

locations, quantities, or sizes of materials

required.
</li>
<li>	
Connect columns, beams, and girders with bolts,

following blueprints and instructions from

supervisors.
</li>
<li>	
Bolt aligned structural steel members in position

for permanent riveting, bolting, or welding into

place.
</li>
<li>	
Fasten structural steel members to hoist cables,

using chains, cables, or rope.
</li>
<li>	
Verify vertical and horizontal alignment of

structural steel members, using plumb bobs, laser

equipment, transits, or levels.
</li>
<li>	
Hoist steel beams, girders, or columns into place,

using cranes or signaling hoisting equipment

operators to lift and position structural steel

members.
</li>
<li>	
Cut, bend, or weld steel pieces, using metal

shears, torches, or welding equipment.
</li>
<li>	
Unload and position prefabricated steel units for

hoisting as needed.
</li>
<li>	
Drive drift pins through rivet holes to align rivet

holes in structural steel members with

corresponding holes in previously placed

members.
</li>
<li>	
Assemble hoisting equipment or rigging, such as

cables, pulleys, or hooks, to move heavy

equipment or materials.
</li>
<li>	
Fabricate metal parts, such as steel frames,

columns, beams, or girders, according to

blueprints or instructions from supervisors.
</li>
</ol>
</p>
                           
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="wrap p-5 mb-4">
                            <div class="wrap-box">
                                <h4 class="mb-3">Structural Steel Fabricator</h4>
                                <p class="pb-2"><strong>Experience:</strong>Do not apply if you do not have steel fabricating experience. Do not apply if you only have

commercial or carpentry experience. Must have prior industrial construction experience. Hiring is for the

skilled craft of A36 steel fabrication and fitting. Skills: Must have a valid driver’s license and/or available

transportation to current jobs in Alabama and Georgia. Per diem is paid for travel. Duties: Work under

the direction of an experienced supervisor as needed for cutting, fitting, fabrication, and welding A36

structural steel.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="wrap p-5 mb-4">
                            <div class="wrap-box">
                               
								<h4 class="mb-3">Industrial Construction Labor</h4>
                                <p class="pb-2"><strong>Description:</strong> Do not apply if you only have commercial or carpentry experience. Must have prior

industrial construction experience. Hiring is for industrial construction general labor and skilled crafts in

layout, welding, operating forklift and manlift. Skills: Current operator certifications for forklift and

manlift are a plus. Must have a valid driver’s license and/or available transportation to current jobs in

Alabama and Georgia. Duties: Work under the direction of an experienced supervisor as needed for steel

erection, material handling, and equipment setting.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <?php $this->load->view('common/footer'); ?>

    </div>
<?php $this->load->view('common/end'); ?>
<div class="custom-pop">
        <div class="wrap">
            <p>I hereby authorize and request each former employer and person, firm, or corporation given as reference to answer any and all questions that may be asked in reference to information legally available towards my potential employment with Linco, LLC. I also agree to submit myself to drug and/or alcohol examination by a Linco, LLC representative or physician as often as needed. I understand that Linco, LLC conducts pre-employment, random, and post-accident drug testing of all employees and potential job applicants. I also understand that a positive result drug testing will result in my immediate termination from the company and/or any offer to work for and with Linco, LLC. If employed by Linco, LLC I agree to furnish requested and required documentation as proof of legal age and work status as per the current U.S. law.</p>
            <div class="custom-pop-close">
                <i class="fas fa-times"></i>
            </div>
        </div>
    </div>
    <script>
        $(".drug-check").on('click', function(){
            if($(this).is(":checked")){
                $(".application-btn").removeClass('off');
            }
            else if($(this).is(":not(:checked)")){
                $(".application-btn").addClass('off');
            }
        })
    </script>  
<script>
        // Datepicker 
	     init_date();
         function init_date() {
            $( ".datepicker" ).attr('type','date');
        };
		function validate_form(){
		var flag_check = true;	
		if($('#military-toggle:checked').val()=="on"){
		flag_check = check_ele('.military-tab input,.military-tab select');	
		}
		if($('#college-toggle-toggle:checked').val()=="yes"){
		flag_check = check_ele('.college-tab input,.college-tab select');		
		}
		if($('#business-toggle:checked').val()=="yes"){
		flag_check = check_ele('.business-tab input,.business-tab select');
		}	
		if($('#arrest-toggle:checked').val()=="yes"){
		flag_check = check_ele('.arrest_tab input,.arrest_tab select');	
		}
		if(!check_ele('.work_history_wrap input,.work_history_wrap select')||$('#button_work_history').attr('count')!=0){
		alertit('Please provide us information about your last 3 jobs','danger');
		flag_check =false;
		}
		else if(!check_ele('.refrence-div-wrap input,.refrence-div-wrap select')||$('#add-refrence-button').attr('count')!=0){
		alertit('Please provide us at least 3 refrences','danger');	
		flag_check =false;	
		}	
		else if(flag_check){
		var obj = $('#career_form_submit');
		var btn = obj.html();	
		$('#skills')	
		$.ajax({
			url: "<?=base_url()?>site/carrer",
			method: "POST",
			data: $('#career_form').serialize(),
			dataType: 'json',
			beforeSend: function () {
				obj.html('Sending...');
				obj.attr('disabled', 'disabled');
			},
			success: function (data) {
				obj.html(btn);
				obj.removeAttr('disabled');
				if (data.error == 1) {
					$('#career_form')[0].reset();
					$('.reference button,.button_remove_job').trigger('click');
					alertit(data.msg, 'success');
				} else {
					alertit(data.msg, 'danger');
				}
			}
		});		
		}else{
		alertit('Please fill all the fields before you submit.','danger');
		}	
		return flag_check	
		}
		function check_ele(selector){
		var flag = true;	
		$(selector).each(function(ele){ 
		if($(this).val()==""&&!$(this).hasClass('notrequired')&&!$(this).hasClass('d-none')){
		$(this).addClass('has-error').trigger('focus');
        $(this).get(0).scrollIntoView();
		return flag = false;		
		}	 
		});
		return 	flag;
		}
	 $(document).on('keydown','.txtnumber2',function (e) {
            var key = e.charCode || e.keyCode || 0;
            $text = $(this); 
			 if(typeof $(this).attr('maxlength')=="undefined"){
			$(this).attr('maxlength',12);
			}	
            if (key !== 8 && key !== 9) {
                if ($text.val().length === 3) {
                    $text.val($text.val() + '.');
                }
                if ($text.val().length === 7) {
                    $text.val($text.val() + '.');
                }
				if($text.val().length > 7&&$text.val().indexOf('.')==-1){
					var str = $text.val();
					var final_str = "";
					for(var i =0;i<str.length;i++){
						final_str+= str[i];
						if(i==3||i==7){
						final_str+=".";
						}
					}
				}
            }
            return (key == 8 || key == 9 || key == 46 || (key >= 48 && key <= 57) || (key >= 96 && key <= 105));
        })  
	//
    </script>	
</body>

</html>