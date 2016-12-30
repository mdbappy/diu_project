<?php
	
	if($this->session->userdata('admin_login') != 1)
	{
		redirect(base_url() . 'index.php?login', 'refresh');
		exit;
	}
	
	$stu_info = $this->crud_model->get_student_info($student_id);
	foreach($stu_info as $stu_data)
	{}
	
	$get_exams = $this->crud_model->get_exams();
	
	$subject_list = $this->crud_model->get_subjects_by_class($class_id);
	
	
?>

<!DOCTYPE html >
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Free Web tutorials">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
    <meta name="author" content="Hege Refsnes">
    <title>Mark Sheet</title>
</head>

<body>



    <table width="95%" border="2" cellspacing="5" cellpadding="5" align="center">
        <tr>
            <td width="35%">
                <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:0px;">
                    <tr>
                        <td>  
                            <table width="100%" border="1" cellspacing="5" cellpadding="5">
                                <tr>
                                    <td>&#2454;&#2472;&#2509;&#2465;&#2478;&#2494;&#2472;</td>
                                    <td>&#2474;&#2494;&#2486; &#2472;&#2478;&#2509;&#2476;&#2480; </td>
                                </tr>
                                <tr>
                                    <td>&#2541;&#2534;</td>
                                    <td>&#2536;&#2535;</td>
                                </tr>
                                <tr>
                                    <td>&#2540;&#2534;</td>
                                    <td>&#2535;&#2542;</td>
                                </tr>
                                <tr>
                                    <td>&#2538;&#2534;</td>
                                    <td>&#2535;&#2536;</td>
                                </tr>
                                <tr>
                                    <td>&#2537;&#2539;</td>
                                    <td>&#2535;&#2534;</td>
                                </tr>
                                <tr>
                                    <td>&#2537;&#2534;</td>
                                    <td>&#2543;</td>
                                </tr>
                                <tr>
                                    <td>&#2536;&#2539;</td>
                                    <td>&#2542;</td>
                                </tr>
                                <tr>
                                    <td>&#2535;&#2534;&#2534;</td>
                                    <td>&#2537;&#2537;</td>
                                </tr>
                            </table>	</td>
                        <td>
                            <table width="100%" border="1" cellspacing="5" cellpadding="5">
                                <tr>
                                    <td>&#2474;&#2498;&#2480;&#2509;&#2472;&#2478;&#2494;&#2472; </td>
                                    <td>&#2474;&#2494;&#2486; &#2472;&#2478;&#2509;&#2476;&#2480; </td>
                                </tr>
                                <tr>
                                    <td>&#2535;&#2534;&#2534;</td>
                                    <td>&#2537;&#2537;</td>
                                </tr>
                                <tr>
                                    <td>&#2540;&#2534;</td>
                                    <td>&#2536;&#2534;</td>
                                </tr>
                                <tr>
                                    <td>&#2539;&#2534;</td>
                                    <td>&#2535;&#2541; </td>
                                </tr>
                            </table>	</td>
                    </tr>
                </table>	</td>
            <td width="41%" align="center">
                <h2>XYZ High School</h2>
                <h4>Name:&nbsp;<?php echo $stu_data["name"]; ?></h4>
				<h4>Roll:&nbsp;<?php echo $stu_data["roll"]; ?></h4>
				<h4>Class:&nbsp;<?php echo $this->crud_model->get_class_name($stu_data["class_id"]); ?></h4>
				<h4>Section:&nbsp;<?php echo $this->crud_model->get_section_name($stu_data["section_id"]); ?></h4>
                </td>
            <td width="24%"> 
                <table width="100%" border="1" cellspacing="5" cellpadding="5">
                    <tr>
                        <td>&#2488;&#2509;&#2453;&#2507;&#2480;</td>
                        <td>&#2482;&#2503;&#2463;&#2494;&#2480; &#2455;&#2509;&#2480;&#2503;&#2465; </td>
                        <td>&#2455;&#2509;&#2480;&#2503;&#2465; &#2474;&#2527;&#2503;&#2472;&#2509;&#2463; </td>
                    </tr>
                    <tr>
                        <td>(&#2542;&#2534;-&#2535;&#2534;&#2534;)%</td>
                        <td>A+</td>
                        <td>5</td>
                    </tr>
                    <tr>
                        <td>(&#2541;&#2534;-&#2541;&#2543;)%</td>
                        <td>A</td>
                        <td>4</td>
                    </tr>
                    <tr>
                        <td>(&#2540;&#2534;-&#2540;&#2543;)%</td>
                        <td>A-</td>
                        <td>3.5</td>
                    </tr>
                    <tr>
                        <td>(&#2539;&#2534;-&#2539;&#2543;)%</td>
                        <td>B</td>
                        <td>3</td>
                    </tr>
                    <tr>
                        <td>(&#2538;&#2534;-&#2538;&#2543;)%</td>
                        <td>C</td>
                        <td>2</td>
                    </tr>
                    <tr>
                        <td>(&#2537;&#2537;-&#2537;&#2543;)%</td>
                        <td>D</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>(&#2534;&#2534;-&#2537;&#2536;)%</td>
                        <td>F</td>
                        <td>0</td>
                    </tr>
                </table>	</td>
        </tr>
        <tr>
            <td colspan="3">

                <table width="100%" border="1" cellspacing="2" cellpadding="2">
                    <tr>
                        <td colspan="2">&nbsp;</td>
                        <td colspan="16">&#2458;&#2497;&#2524;&#2494;&#2472;&#2509;&#2468; &#2478;&#2498;&#2482;&#2509;&#2479;&#2494;&#2527;&#2467; (&#2535;&#2534;&#2534; x &#2536; = &#2536;&#2534;&#2534; ) </td>
						
                        <td rowspan="3">&#2458;&#2498;&#2524;&#2494;&#2472;&#2509;&#2468; &#2475;&#2482;&#2494;&#2475;&#2482; &#2472;&#2495;&#2480;&#2509;&#2471;&#2494;&#2480;&#2467; </td>
                    </tr>
                    <tr>
                        <td colspan="2">&nbsp;</td>
                        <td colspan="8">&#2437;&#2480;&#2509;&#2471;&#2476;&#2494;&#2480;&#2509;&#2487;&#2495;&#2453;/ &#2474;&#2509;&#2480;&#2494;&#2453; &#2472;&#2495;&#2480;&#2509;&#2476;&#2494;&#2458;&#2472;&#2496; </td>
                        <td colspan="8">&#2476;&#2494;&#2480;&#2509;&#2487;&#2495;&#2453;/&#2472;&#2495;&#2480;&#2509;&#2476;&#2494;&#2458;&#2472;&#2496;</td>
                    </tr>
                    <tr>
                        <td>&#2476;&#2495;&#2487;&#2527; </td>
                        <td>&#2488;&#2494;&#2476;&#2460;&#2503;&#2453;&#2509;&#2463; &#2472;&#2478;&#2509;&#2476;&#2480; </td>
                        <td>&#2480;&#2458;&#2472;&#2494;</td>
                        <td>&#2472;&#2504;&#2476;&#2509;&#2479;&#2435;</td>
                        <td> &#2476;&#2509;&#2479;&#2476;&#2435; </td>
                        <td>&#2478;&#2507;&#2463; &#2474;&#2509;&#2480;&#2494;&#2474;&#2509;&#2468; &#2472;&#2478;&#2509;&#2476;&#2480; </td>
                        <td>&#2486;&#2509;&#2480;&#2503;&#2467;&#2495;&#2468;&#2503; &#2488;&#2480;&#2509;&#2476;&#2507;&#2458;&#2509;&#2458; &#2472;&#2478;&#2509;&#2476;&#2480; </td>
                        <td>&#2482;&#2503;&#2463;&#2494;&#2480; &#2455;&#2509;&#2480;&#2503;&#2465; </td>
                        <td>&#2455;&#2509;&#2480;&#2503;&#2465; &#2474;&#2527;&#2503;&#2472;&#2509;&#2463; </td>
                        <td>GPA</td>
                        <td>&#2480;&#2458;&#2472;&#2494;</td>
                        <td>&#2472;&#2504;&#2476;&#2509;&#2479;&#2435;</td>
                        <td>&#2476;&#2509;&#2479;&#2476;&#2435; </td>
                        <td>&#2478;&#2507;&#2463; &#2474;&#2509;&#2480;&#2494;&#2474;&#2509;&#2468; &#2472;&#2478;&#2509;&#2476;&#2480; </td>
                        <td>&#2486;&#2509;&#2480;&#2503;&#2467;&#2495;&#2468;&#2503; &#2488;&#2480;&#2509;&#2476;&#2507;&#2458;&#2509;&#2458; &#2472;&#2478;&#2509;&#2476;&#2480;</td>
                        <td>&#2482;&#2503;&#2463;&#2494;&#2480; &#2455;&#2509;&#2480;&#2503;&#2465;</td>
                        <td>&#2455;&#2509;&#2480;&#2503;&#2465; &#2474;&#2527;&#2503;&#2472;&#2509;&#2463; </td>
                        <td>GPA</td>
                    </tr>
					
					<!-- Subject loop start From Here-->
					
					<?php
						$i = 0;
						$row_span = "";
						$frst_trm_exm_rslt = "";
						$final_trm_exm_rslt = "";
						
						foreach($subject_list as $sbjcts):
						$i++;
						if($i == 1)
						{
							$row_span = 'rowspan="'.count($subject_list).'"';
							//$i = 0;
						}
						else
							$row_span = "";
							
						/////////////////////////////////First Term Exam Result///////////////////////////////////	
						
						$verify_data = array('exam_id' => $get_exams[0]["exam_id"],
                                                        'class_id' => $class_id,
                                                        'subject_id' => $sbjcts['subject_id'],
                                                        'student_id' => $stu_data['student_id']);

						$fst_trm_mark_query = $this->db->get_where('mark', $verify_data);
						$fst_trm_marks = $fst_trm_mark_query->row_array(0);
						
						
						$verify_data = array('exam_id' => $get_exams[0]["exam_id"],
                                                        'class_id' => $class_id,
                                                        'subject_id' => $sbjcts['subject_id']);
						
						$sql = $this->db->where($verify_data)
									->select_max("mark_obtained");												
						
						$sbjct_max_mrk_query =  $sql->get("mark");
						$frst_trm_heighest_mark = $sbjct_max_mrk_query->row_array(0);
						
						$tmp_get_grade = $this->crud_model->get_grade((!empty($fst_trm_marks["mark_obtained"]))? (float) $fst_trm_marks["mark_obtained"] : 0 ); 
						
						$fst_trm_subjct_grd[$i-1] = $tmp_get_grade["name"]; 
						
						$fst_trm_subjct_point[$i-1] = $tmp_get_grade["grade_point"];
						
						if($fst_trm_subjct_point[$i-1]<=0)
							 $frst_trm_exm_rslt = "FAILED";
							 
						/////////////////////////////////////First Exam result End////////////////////////////////////////////////	 
						
						/////////////////////////////////////Final Term Exam Result////////////////////////////////////////////////
						
						$verify_data = array('exam_id' => $get_exams[1]["exam_id"],
                                                        'class_id' => $class_id,
                                                        'subject_id' => $sbjcts['subject_id'],
                                                        'student_id' => $stu_data['student_id']);

						$final_trm_mark_query = $this->db->get_where('mark', $verify_data);
						$final_trm_marks = $final_trm_mark_query->row_array(0);
						
						
						$verify_data = array('exam_id' => $get_exams[1]["exam_id"],
                                                        'class_id' => $class_id,
                                                        'subject_id' => $sbjcts['subject_id']);
						
						$sql = $this->db->where($verify_data)
									->select_max("mark_obtained");												
						
						$sbjct_max_mrk_query =  $sql->get("mark");
						$final_trm_heighest_mark = $sbjct_max_mrk_query->row_array(0);
						
						$tmp_get_grade = $this->crud_model->get_grade((!empty($final_trm_marks["mark_obtained"]))? (float) $final_trm_marks["mark_obtained"] : 0 ); 
						
						$final_trm_subjct_grd[$i-1] = $tmp_get_grade["name"]; 
						
						$final_trm_subjct_point[$i-1] = $tmp_get_grade["grade_point"];
						
						if($final_trm_subjct_point[$i-1]<=0)
							 $final_trm_exm_rslt = "FAILED";
						
						/////////////////////////////////////Final Term Exam Result End////////////////////////////////////////////
						
						
					
					?>
					
                    <tr>
                        <td align="center"><?php echo $sbjcts["name"]; ?></td>
                        <td align="center"><?php echo (!empty($fst_trm_marks["mark_total"]))? $fst_trm_marks["mark_total"] : "00"; ?></td>
                        <td align="center">--</td>
                        <td align="center">--</td>
                        <td align="center">--</td>
                        <td align="center"><?php echo (!empty($fst_trm_marks["mark_obtained"]))? $fst_trm_marks["mark_obtained"] : "00"; ?></td>
                        <td align="center"><?php echo (!empty($frst_trm_heighest_mark["mark_obtained"]))? $frst_trm_heighest_mark["mark_obtained"] : "00"; ?></td>
                        <td align="center"><?php echo $fst_trm_subjct_grd[$i-1]; ?></td>
                        <td align="center" ><?php echo $fst_trm_subjct_point[$i-1];?></td>
						<?php if($i==1){ ?>
                        <td align="center" id="first_exam_gpa" style="font-weight:bold;" <?php echo $row_span; ?>>&nbsp;</td>
						<?php } ?>
                        <td align="center">--</td>
                        <td align="center">--</td>
                        <td align="center">--</td>
                        <td align="center"><?php echo (!empty($final_trm_marks["mark_obtained"]))? $final_trm_marks["mark_obtained"] : "00"; ?></td>
                        <td align="center"><?php echo (!empty($final_trm_heighest_mark["mark_obtained"]))? $final_trm_heighest_mark["mark_obtained"] : "00"; ?></td>
                        <td align="center"><?php echo $final_trm_subjct_grd[$i-1]; ?></td>
                        <td align="center" ><?php echo $final_trm_subjct_point[$i-1];?></td>
						<?php if($i==1){ ?>
                        <td align="center" id="final_exam_gpa" style="font-weight:bold;" <?php echo $row_span; ?>>&nbsp;</td>
                        <td <?php echo $row_span; ?> id="final_total_result_gpa" style="font-weight:bold;text-align:center;">&nbsp;</td>
						<?php } ?>
                    </tr>
					
					<?php
						endforeach;
					?>
                    
					<!-- Subject loop End Here-->
                    
                </table>


            </td>
        </tr>        
    </table>




<?php

	if($frst_trm_exm_rslt != "FAILED")
	{
		
		$frst_trm_rslt_point = round((array_sum($fst_trm_subjct_point) / count($subject_list)), 2);
		$frst_rslt_grd = $this->crud_model->get_point_to_grade($frst_trm_rslt_point)["name"];
		
		
	}
	else
	{
		$frst_trm_rslt_point =round(0.00,2);
		$frst_rslt_grd = "F";
	}
	
	if($final_trm_exm_rslt != "FAILED")
	{
		
		$final_trm_rslt_point = round((array_sum($final_trm_subjct_point) / count($subject_list)), 2);
		$final_rslt_grd = $this->crud_model->get_point_to_grade($final_trm_rslt_point)["name"];
		
		
	}
	else
	{
		$final_trm_rslt_point =round(0.00,2);
		$final_rslt_grd = "F";
	}
	
	if($frst_trm_exm_rslt != "FAILED" && $final_trm_exm_rslt != "FAILED")
	{
		
		$final_total_result_point = round(($frst_trm_rslt_point + $final_trm_rslt_point) / 2, 2);
		$final_total_result_grd = $this->crud_model->get_point_to_grade($final_total_result_point)["name"];
		
		
	}
	else
	{
		$final_total_result_point = 0.00;
		$final_total_result_grd = "FAILED";
	}
	
	

?>

<script language="javascript">
	var first_term_point = parseFloat(<?php echo $frst_trm_rslt_point; ?>);
	var final_term_point = parseFloat(<?php echo $final_trm_rslt_point; ?>);
	var final_total_result_point = parseFloat(<?php echo $final_total_result_point; ?>);
	
	document.getElementById("first_exam_gpa").innerHTML = ((first_term_point == 0)? '0.00' : first_term_point) + '<br/>(<?php echo $frst_rslt_grd; ?>)';
	document.getElementById("final_exam_gpa").innerHTML = ((final_term_point == 0)? '0.00' : final_term_point) + '<br/>(<?php echo $final_rslt_grd; ?>)';
	document.getElementById("final_total_result_gpa").innerHTML = ((final_total_result_point == 0)? '0.00' : final_total_result_point) + '<br/>(<?php echo $final_total_result_grd; ?>)';
	
	window.onload = (function(){
		window.print();
	});
</script>


</body>
</html>
