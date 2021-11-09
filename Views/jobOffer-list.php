<?php 
     session_start();
     require_once('nav.php');

     use DAO\JobOfferDAO as JobOfferDAO;
     use DAO\JobPositionDAO as JobPositionDAO;
     use DAO\CareerDAO as CareerDAO;
     use DAO\CompanyDAO as CompanyDAO;

     $jobOfferDAO = new JobOfferDAO();
     $jobPositionDAO = new JobPositionDAO();
     $careerDAO = new CareerDAO();
     $companyDAO = new CompanyDAO();
     $jobOfferList = $jobOfferDAO->getAll();
     $jobPositionList = $jobPositionDAO->getAll();
     $careerList = $careerDAO->getAll();
     $companyList = $companyDAO->getAll();
?>

<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Datos de postulacion</h2>
               <table class="table bg-light-alpha">
                    <thead>
                         <th>Puesto laboral</th>
                         <th>Carrera</th>
                         <th>Compañia</th>
                         <th>Salario aproximado</th>
                         <th>Puesto remoto?</th>
                         <th>Descripcion</th>
                         <th>Habilidades</th>
                         <th>Fecha de publicacion</th>
                         <th>Fecha de expiracion</th>
                    </thead>
                    <tbody>
                         <?php foreach($jobOfferList as $jobOffer) { //TODO:VER COMO HACER QUE CADA USER VEA LAS POSTULACIONES CORRESPONDIENTES Y MERGEAR  
                              if($_SESSION['userLogged']->getRole() == 'student' || $_SESSION['userLogged']->getRole() == 'admin'){ 
                                   if($_SESSION['userLogged']->getRole() == 'company'){
                                        if($_SESSION['userLogged']->getCompanyId() == $jobOffer->getCompanyId()){ ?>
                                             <tr>
                                                  <?php foreach($jobPositionList as $jobPosition) {
                                                       if($jobPosition->getJobPositionId() == $jobOffer->getJobPosition()) { ?>
                                                            <td><?php echo $jobPosition->getDescription(); ?></td>
                                                       <?php } ?>
                                                  <?php } ?>
                                                  <?php foreach($careerList as $career) {
                                                       if($career->getCareerId() == $jobOffer->getCareerId()) { ?>
                                                            <td><?php echo $career->getDescription(); ?></td>
                                                       <?php } ?>
                                                  <?php } ?>
                                                  <?php foreach($companyList as $company) {
                                                       if($company->getCompanyId() == $jobOffer->getCompanyId()) { ?>
                                                            <td><?php echo $company->getName(); ?></td>
                                                       <?php } ?>
                                                  <?php } ?>
                                                  <td><?php echo $jobOffer->getSalary() ?></td>
                                                  <td><?php if ($jobOffer->getIsRemote() == 1){
                                                            echo "Si";
                                                   } else {
                                                            echo "No";
                                                   } ?></td>
                                                  <td><?php echo $jobOffer->getDescription() ?></td>
                                                  <td><?php echo $jobOffer->getSkills() ?></td>
                                                  <td><?php echo $jobOffer->getStartingDate() ?></td>
                                                  <td><?php echo $jobOffer->getEndingDate() ?></td>
                                              
                                              

                                                       <?php if ($_SESSION['userLogged']->getRole() == "admin") { ?>
                                                       
                                                  <td>
                                                       <form action="<?php echo FRONT_ROOT ?>JobOffer/ShowEditView" method="POST">
                                                            <button type="submit" name='jobOfferId' value=<?php echo $jobOffer->getJobOfferId() ?> class="btn btn-dark ml-auto d-block">Editar</button>
                                                       </form>
                                                  </td>
                                                  <td>
                                                       <form action="<?php echo FRONT_ROOT ?>JobOffer/delete" method="POST">
                                                            <button type="submit" name='jobOfferId' value=<?php echo $jobOffer->getJobOfferId() ?> class="btn btn-dark ml-auto d-block">Eliminar</button>
                                                       </form>
                                                  </td>
                                                  <?php } else if ($_SESSION['userLogged']->getRole() == "student") { ?>
                                                  <td>
                                                       <form action="<?php echo FRONT_ROOT ?>JobOffer/AddPostulant" method="POST">
                                                            <input type="hidden" name="jobOfferId" value=<?php echo $jobOffer->getJobOfferId() ?>>
                                                            <button type="submit" name='studentId' value=<?php echo $_SESSION['userLogged']->getStudentId() ?> class="btn btn-dark ml-auto d-block">Postularse</button>
                                                       </form>
                                                  </td>
                                                  <?php } ?>
                                             </tr>
                              <?php }}}                    
                         } ?>        
                    </tbody>
               </table>
          </div>
     </section>
</main>