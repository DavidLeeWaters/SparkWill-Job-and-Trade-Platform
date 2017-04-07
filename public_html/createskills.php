<?php include "databaselogin.php"; session_start(); ?>

<link rel="stylesheet" type="text/css" href="css/main.css">
<link rel="stylesheet" type="text/css" href="css/background.css">
<link rel="stylesheet" type="text/css" href="css/list.css">
<style>
input[type="checkbox"]{
  width: 30px;
  height: 30px;
}
</style>

<link rel="icon" type="image/png" href="images/Logo.png" sizes="16x16">
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />


<a class="newbutton" style="position: fixed; top: 1px; height: 40px; z-index: 2000; text-align: center; font-size: 15; font-weight: bold; float:left; color:white; cursor:pointer;" onclick="window.history.back();">Go Back</a>

<?php
if (isset($_SESSION['username'])){
$username = $_SESSION['username'];
echo "<scrip"."t>";
echo "if (!(window.frameElement)) {window.location = 'blank.php?page=createskills.php'}";
echo "</scrip"."t>";
} else {
echo "
<script>
window.history.back();
</script>
";
}
?>


<script>
if (window.frameElement) {
  window.parent.history.replaceState('Object', 'Title', '/blank.php?page=createskills.php');
}
</script>



<title>Create Skills</title>   

<script>
 window.parent.document.title = "Create Skills";
</script>

    <header>
      <div class="wrapper" onclick="document.getElementById('showlight').style.visibility ='hidden'; document.getElementById('show').style.visibility ='hidden';">
          <nav style="">
<img src="images/Logo.png" alt="Logo" height="40px" width="40px"></img>
<a class='maintabs' href="index.php">Home</a>

			
<?php 
if (!empty($_SESSION['loggedin'])){
include 'loggedinmenu.php';
}
?>


<font style='font-size: 40; margin-left: 16.5%; cursor: default; color: white; font-weight: bold;'>Skills</font>

          </nav>
      </div>
    </header>


		

















<br><br><br>
<center>



<form method="post" action="accountindex.php" enctype="multipart/form-data" id="k">
<br>
<br>
<span style="font-family: Arial, Helvetica, sans-serif; font-size: 25; color:black; background: white; cursor: default;">

<input type="checkbox" name="advise_clients_or_customers" value="advise_clients_or_customers," id="advise_clients_or_customers" /><span class="skillstext" onclick="checker('advise_clients_or_customers')">advise clients or customers</span><br><br>
<input type="checkbox" name="answer_customer_or_public_inquiries" value="answer_customer_or_public_inquiries," id="answer_customer_or_public_inquiries" /><span class="skillstext" onclick="checker('answer_customer_or_public_inquiries')">answer customer or public inquiries</span><br><br>
<input type="checkbox" name="call_on_customers_to_solicit_new_business" value="call_on_customers_to_solicit_new_business," id="call_on_customers_to_solicit_new_business" /><span class="skillstext" onclick="checker('call_on_customers_to_solicit_new_business')">call on customers to solicit new business</span><br><br>
<input type="checkbox" name="climb_ladders_and_scaffolding_and_or_utility_or_telephone_poles" value="climb_ladders_and_scaffolding_and_or_utility_or_telephone_poles," id="climb_ladders_and_scaffolding_and_or_utility_or_telephone_poles" /><span class="skillstext" onclick="checker('climb_ladders_and_scaffolding_and_or_utility_or_telephone_poles')">climb ladders and scaffolding and or utility or telephone poles</span><br><br>
<input type="checkbox" name="communicate_technical_information" value="communicate_technical_information," id="communicate_technical_information" /><span class="skillstext" onclick="checker('communicate_technical_information')">communicate technical information</span><br><br>
<input type="checkbox" name="communicate_visually_or_verbally" value="communicate_visually_or_verbally," id="communicate_visually_or_verbally" /><span class="skillstext" onclick="checker('communicate_visually_or_verbally')">communicate visually or verbally</span><br><br>
<input type="checkbox" name="conduct_or_attend_staff_meetings" value="conduct_or_attend_staff_meetings," id="conduct_or_attend_staff_meetings" /><span class="skillstext" onclick="checker('conduct_or_attend_staff_meetings')">conduct or attend staff meetings</span><br><br>
<input type="checkbox" name="confer_with_engineering_and_technical_or_manufacturing_personnel" value="confer_with_engineering_and_technical_or_manufacturing_personnel," id="confer_with_engineering_and_technical_or_manufacturing_personnel" /><span class="skillstext" onclick="checker('confer_with_engineering_and_technical_or_manufacturing_personnel')">confer with engineering and technical or manufacturing personnel</span><br><br>
<input type="checkbox" name="consult_with_customers_concerning_needs" value="consult_with_customers_concerning_needs," id="consult_with_customers_concerning_needs" /><span class="skillstext" onclick="checker('consult_with_customers_concerning_needs')">consult with customers concerning needs</span><br><br>
<input type="checkbox" name="develop_budgets" value="develop_budgets," id="develop_budgets" /><span class="skillstext" onclick="checker('develop_budgets')">develop budgets</span><br><br>
<input type="checkbox" name="develop_or_maintain_databases" value="develop_or_maintain_databases," id="develop_or_maintain_databases" /><span class="skillstext" onclick="checker('develop_or_maintain_databases')">develop or maintain databases</span><br><br>
<input type="checkbox" name="develop_plans_for_programs_or_projects" value="develop_plans_for_programs_or_projects," id="develop_plans_for_programs_or_projects" /><span class="skillstext" onclick="checker('develop_plans_for_programs_or_projects')">develop plans for programs or projects</span><br><br>
<input type="checkbox" name="examine_files_or_documents_to_obtain_information" value="examine_files_or_documents_to_obtain_information," id="examine_files_or_documents_to_obtain_information" /><span class="skillstext" onclick="checker('examine_files_or_documents_to_obtain_information')">examine files or documents to obtain information</span><br><br>
<input type="checkbox" name="file_or_retrieve_paper_documents_and_related_materials" value="file_or_retrieve_paper_documents_and_related_materials," id="file_or_retrieve_paper_documents_and_related_materials" /><span class="skillstext" onclick="checker('file_or_retrieve_paper_documents_and_related_materials')">file or retrieve paper documents and related materials</span><br><br>
<input type="checkbox" name="fill_out_business_or_government_forms" value="fill_out_business_or_government_forms," id="fill_out_business_or_government_forms" /><span class="skillstext" onclick="checker('fill_out_business_or_government_forms')">fill out business or government forms</span><br><br>
<input type="checkbox" name="follow_safe_waste_disposal_procedures" value="follow_safe_waste_disposal_procedures," id="follow_safe_waste_disposal_procedures" /><span class="skillstext" onclick="checker('follow_safe_waste_disposal_procedures')">follow safe waste disposal procedures</span><br><br>
<input type="checkbox" name="follow_tax_laws_or_regulations" value="follow_tax_laws_or_regulations," id="follow_tax_laws_or_regulations" /><span class="skillstext" onclick="checker('follow_tax_laws_or_regulations')">follow tax laws or regulations</span><br><br>
<input type="checkbox" name="greet_customers_and_guests_and_visitors_and_or_passengers" value="greet_customers_and_guests_and_visitors_and_or_passengers," id="greet_customers_and_guests_and_visitors_and_or_passengers" /><span class="skillstext" onclick="checker('greet_customers_and_guests_and_visitors_and_or_passengers')">greet customers and guests and visitors and or passengers</span><br><br>
<input type="checkbox" name="maintain_records_and_reports_and_or_files" value="maintain_records_and_reports_and_or_files," id="maintain_records_and_reports_and_or_files" /><span class="skillstext" onclick="checker('maintain_records_and_reports_and_or_files')">maintain records and reports and or files</span><br><br>
<input type="checkbox" name="maintain_relationships_with_clients" value="maintain_relationships_with_clients," id="maintain_relationships_with_clients" /><span class="skillstext" onclick="checker('maintain_relationships_with_clients')">maintain relationships with clients</span><br><br>
<input type="checkbox" name="make_decisions" value="make_decisions," id="make_decisions" /><span class="skillstext" onclick="checker('make_decisions')">make decisions</span><br><br>
<input type="checkbox" name="make_presentations" value="make_presentations," id="make_presentations" /><span class="skillstext" onclick="checker('make_presentations')">make presentations</span><br><br>
<input type="checkbox" name="modify_work_procedures_or_processes_to_meet_deadlines" value="modify_work_procedures_or_processes_to_meet_deadlines," id="modify_work_procedures_or_processes_to_meet_deadlines" /><span class="skillstext" onclick="checker('modify_work_procedures_or_processes_to_meet_deadlines')">modify work procedures or processes to meet deadlines</span><br><br>
<input type="checkbox" name="move_or_fit_heavy_objects" value="move_or_fit_heavy_objects," id="move_or_fit_heavy_objects" /><span class="skillstext" onclick="checker('move_or_fit_heavy_objects')">move or fit heavy objects</span><br><br>
<input type="checkbox" name="obtain_information_from_clients_and_customers_and_or_patients" value="obtain_information_from_clients_and_customers_and_or_patients," id="obtain_information_from_clients_and_customers_and_or_patients" /><span class="skillstext" onclick="checker('obtain_information_from_clients_and_customers_and_or_patients')">obtain information from clients and customers and or patients</span><br><br>
<input type="checkbox" name="package_goods_for_shipment_or_storage" value="package_goods_for_shipment_or_storage," id="package_goods_for_shipment_or_storage" /><span class="skillstext" onclick="checker('package_goods_for_shipment_or_storage')">package goods for shipment or storage</span><br><br>
<input type="checkbox" name="prepare_reports_for_management" value="prepare_reports_for_management," id="prepare_reports_for_management" /><span class="skillstext" onclick="checker('prepare_reports_for_management')">prepare reports for management</span><br><br>
<input type="checkbox" name="provide_customer_service" value="provide_customer_service," id="provide_customer_service" /><span class="skillstext" onclick="checker('provide_customer_service')">provide customer service</span><br><br>
<input type="checkbox" name="read_technical_drawings" value="read_technical_drawings," id="read_technical_drawings" /><span class="skillstext" onclick="checker('read_technical_drawings')">read technical drawings</span><br><br>
<input type="checkbox" name="retrieve_files_or_charts" value="retrieve_files_or_charts," id="retrieve_files_or_charts" /><span class="skillstext" onclick="checker('retrieve_files_or_charts')">retrieve files or charts</span><br><br>
<input type="checkbox" name="schedule_meetings_or_appointments" value="schedule_meetings_or_appointments," id="schedule_meetings_or_appointments" /><span class="skillstext" onclick="checker('schedule_meetings_or_appointments')">schedule meetings or appointments</span><br><br>
<input type="checkbox" name="stock_or_organize_goods" value="stock_or_organize_goods," id="stock_or_organize_goods" /><span class="skillstext" onclick="checker('stock_or_organize_goods')">stock or organize goods</span><br><br>
<input type="checkbox" name="take_messages" value="take_messages," id="take_messages" /><span class="skillstext" onclick="checker('take_messages')">take messages</span><br><br>
<input type="checkbox" name="understand_second_language" value="understand_second_language," id="understand_second_language" /><span class="skillstext" onclick="checker('understand_second_language')">understand second language</span><br><br>
<input type="checkbox" name="understand_technical_operating_and_service_or_repair_manuals" value="understand_technical_operating_and_service_or_repair_manuals," id="understand_technical_operating_and_service_or_repair_manuals" /><span class="skillstext" onclick="checker('understand_technical_operating_and_service_or_repair_manuals')">understand technical operating and service or repair manuals</span><br><br>
<input type="checkbox" name="use_cash_registers" value="use_cash_registers," id="use_cash_registers" /><span class="skillstext" onclick="checker('use_cash_registers')">use cash registers</span><br><br>
<input type="checkbox" name="use_computers_to_enter_and_access_or_retrieve_data" value="use_computers_to_enter_and_access_or_retrieve_data," id="use_computers_to_enter_and_access_or_retrieve_data" /><span class="skillstext" onclick="checker('use_computers_to_enter_and_access_or_retrieve_data')">use computers to enter and access or retrieve data</span><br><br>
<input type="checkbox" name="use_conflict_resolution_techniques" value="use_conflict_resolution_techniques," id="use_conflict_resolution_techniques" /><span class="skillstext" onclick="checker('use_conflict_resolution_techniques')">use conflict resolution techniques</span><br><br>
<input type="checkbox" name="use_government_regulations" value="use_government_regulations," id="use_government_regulations" /><span class="skillstext" onclick="checker('use_government_regulations')">use government regulations</span><br><br>
<input type="checkbox" name="use_health_or_sanitation_standards" value="use_health_or_sanitation_standards," id="use_health_or_sanitation_standards" /><span class="skillstext" onclick="checker('use_health_or_sanitation_standards')">use health or sanitation standards</span><br><br>
<input type="checkbox" name="use_interpersonal_communication_techniques" value="use_interpersonal_communication_techniques," id="use_interpersonal_communication_techniques" /><span class="skillstext" onclick="checker('use_interpersonal_communication_techniques')">use interpersonal communication techniques</span><br><br>
<input type="checkbox" name="use_interviewing_procedures" value="use_interviewing_procedures," id="use_interviewing_procedures" /><span class="skillstext" onclick="checker('use_interviewing_procedures')">use interviewing procedures</span><br><br>
<input type="checkbox" name="use_inventory_control_procedures" value="use_inventory_control_procedures," id="use_inventory_control_procedures" /><span class="skillstext" onclick="checker('use_inventory_control_procedures')">use inventory control procedures</span><br><br>
<input type="checkbox" name="use_negotiation_techniques" value="use_negotiation_techniques," id="use_negotiation_techniques" /><span class="skillstext" onclick="checker('use_negotiation_techniques')">use negotiation techniques</span><br><br>
<input type="checkbox" name="use_oral_or_written_communication_techniques" value="use_oral_or_written_communication_techniques," id="use_oral_or_written_communication_techniques" /><span class="skillstext" onclick="checker('use_oral_or_written_communication_techniques')">use oral or written communication techniques</span><br><br>
<input type="checkbox" name="use_project_management_techniques" value="use_project_management_techniques," id="use_project_management_techniques" /><span class="skillstext" onclick="checker('use_project_management_techniques')">use project management techniques</span><br><br>
<input type="checkbox" name="use_public_speaking_techniques" value="use_public_speaking_techniques," id="use_public_speaking_techniques" /><span class="skillstext" onclick="checker('use_public_speaking_techniques')">use public speaking techniques</span><br><br>
<input type="checkbox" name="use_secretarial_procedures" value="use_secretarial_procedures," id="use_secretarial_procedures" /><span class="skillstext" onclick="checker('use_secretarial_procedures')">use secretarial procedures</span><br><br>
<input type="checkbox" name="use_time_management_techniques" value="use_time_management_techniques," id="use_time_management_techniques" /><span class="skillstext" onclick="checker('use_time_management_techniques')">use time management techniques</span><br><br>
<input type="checkbox" name="work_as_a_team_member" value="work_as_a_team_member," id="work_as_a_team_member" /><span class="skillstext" onclick="checker('work_as_a_team_member')">work as a team member</span><br><br>

</span>



<input type='hidden' name='skills' id='skills'>
<br>
        <input type='submit' class='newbutton' value='Update' style='width: 25%;'>
<br>
<br>
</form>

</center>


<script>

function checker(a){
if (document.getElementById(a).checked === true){
document.getElementById(a).checked = false;
} else {
document.getElementById(a).checked = true;
}
}


window.onload = document.body.style.background = 'lightgreen';





<?php
$sql="SELECT * FROM skills WHERE username = ('$username')";
$result = mysql_query($sql);
while($row = mysql_fetch_array($result)) 
{
$skills = $row['skills'];


if (!empty($skills)){
$skills2 = explode(',' , $skills);
foreach($skills2 as $key){
echo "document.getElementById('".$key."').checked = 'true';";
}
}


}
?>



</script>

