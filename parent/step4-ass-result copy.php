<?php
ob_start();
session_start();
include('../admin/config/dbcon.php');
$currentPage="step4";
$hide_side="False";
include('../admin/includes/header.php');
include('includes/navbar.php');

if(!isset($_SESSION['learnerID'])){
  #ob_end_flush();
  #header("Location: inquiries.php");
  #exit(0);
}
?>
<style>
  .main{
    background-color: white;
  }
  .right-button-active{
    font-size: 10px;
    padding: 9px 7px;
    border: 1px solid black;
    margin-left: -1px;
    box-shadow: 5px 2px 5px rgba(0, 0, 0, 0.2);
  }
  .right-button{
    font-size: 10px;
    padding: 9px 7px;
    color: rgba(0, 134, 188);
  }
  .form-control{
    border: none;
  }
</style>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h1>Patient Details</h1>
      <hr>
    </div>
  </div>
  <?php
    $userID = $_SESSION['auth_user']['userID'];
    $query_learnerID = "SELECT * FROM learner WHERE userID='$userID'";
    $query_learnerID_run = mysqli_query($con, $query_learnerID);
    if(mysqli_num_rows($query_learnerID_run) > 0){
      foreach($query_learnerID_run as $row){
        $learnerID=$row['learnerID'];
      }
      $search_learner = "SELECT * FROM learner_report WHERE learnerID='$learnerID'";
      $search_learner_run = mysqli_query($con, $search_learner);
      if($search_learner_run){
        if(mysqli_num_rows($search_learner_run) > 0){
          foreach($search_learner_run as $row){
            $q1=$row['q1'];
            $q2=$row['q2'];
            $q3=$row['q3'];
            $q4=$row['q4'];
            $q5=$row['q5'];
            $q6=$row['q6'];
            $q7=$row['q7'];
            $q8=$row['q8'];
            $q9=$row['q9'];
            $q10=$row['q10'];
            $q11=$row['q11'];
            $q12=$row['q12'];
            $q13=$row['q13'];
            $q14=$row['q14'];
            ?>
            <div class="row">
              <div class="col-md-12">
                <div class="container-fluid">
                  <div class="row">
                    <div class="col-md-12">
                      <h5><strong>DEVELOPMENTAL ASSESSMENT RESULTS</strong></h5>
                      <hr>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <label for="">Chief complaint or concerns <br>(Problema ng bata)</label>
                      <input type="text" value="<?= $q1; ?>" readonly name="q1" placeholder="Answer" class="form-control border-bottom border-dark">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <hr class="mb-1">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <label for="">Can he/she speak in... or does he/she has problems with... <br>(Kaya niya po ba magsalita ng... o may problema siya sa...)</label>
                      <input type="text" value="<?= $q2; ?>" readonly name="q2" placeholder="Answer" class="form-control border-bottom border-dark">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <hr class="mb-1">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <label for="">Can you give examples of sounds, words, phrases or sentences he/she can speak or utter spontaneously.
                      <br>(Magbigay ng halimbawa ng mga salita o pangungusap na kaya niyang bigkasin nang walang tulong.)</label>
                      <input type="text" value="<?= $q3; ?>" readonly name="q3" placeholder="Answer" class="form-control border-bottom border-dark">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <hr class="mb-1">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <label for="">How does he/she communicate when he/she needs to get something or wants to get your attention? 
                      <br>(Paano siya makipagusap o magmuwestra kapag may ipapaabot o mayroon siyang pangagailangan?)</label>
                      <input type="text" value="<?= $q4; ?>" readonly name="q4" placeholder="Answer" class="form-control border-bottom border-dark">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <hr class="mb-1">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <label for="">Can he/she understand simple commands/instructions like Come here., Give, Get? 
                      <br>(Nakakaintidi ba siya ng mga utos tulad ng Pahingi, Halika, Kunin mo ito.)</label>
                      <input type="text" value="<?= $q5; ?>" readonly name="q5" placeholder="Answer" class="form-control border-bottom border-dark">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <hr class="mb-1">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <label for="">Does he/she look when called by name?
                      <br>(Tumitingin ba siya kapag tinawag mo ang pangalan niya?)</label>
                      <input type="text" value="<?= $q6; ?>" readonly name="q6" placeholder="Answer" class="form-control border-bottom border-dark">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <hr class="mb-1">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <label for="">Does he/she have back-and -forth conversation with you or other people.
                      <br>(meron ba siyang pabalik-bali na pakikipag-usap sa inyo ?)</label>
                      <input type="text" value="<?= $q7; ?>" readonly name="q7" placeholder="Answer" class="form-control border-bottom border-dark">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <hr class="mb-1">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <label for="">Please list common behavioral concerns that impairs your child and the family Ex. Aggressive behavior. If there is none, please put N/A
                      <br>(Ilista ang mga problema sa paguugali na nakakahadlang sa paglaki ng bata at nakakaapekto sa pamilya Hal. Nananakit). <br>Kung wala, pakilagay N/A.</label>
                      <input type="text" value="<?= $q8; ?>" readonly name="q8" placeholder="Answer" class="form-control border-bottom border-dark">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <hr class="mb-1">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <label for="">What triggers his/her tantrums, aggression and, self-hitting? If there is none, please put N/A
                      <br>(Ano ang mga dahilan ng pagwawala o pananakit ng bata? Kung wala, pakilagay ang N/A)</label>
                      <input type="text" value="<?= $q9; ?>" readonly name="q9" placeholder="Answer" class="form-control border-bottom border-dark">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <hr class="mb-1">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <label for="">How does he/she play with his/her toys and with other kids? (Ex. Lines/spins/stack/ organize his/her toys, plays alone, says hello to other kids and run with them.)
                      <br>(Paano laruin ng iyong anak ang kanyang mga laruan? Paano siya makipaglaro sa ibang mga bata? Hal. Naglilinya, nagiikot, nagpapatong patong ng mga laruan. Mas gusto niya maglaro magisa?)</label>
                      <input type="text" value="<?= $q10; ?>" readonly name="q10" placeholder="Answer" class="form-control border-bottom border-dark">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <hr class="mb-1">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <label for="">Other concerns? If there is none, please put N/A
                      <br>(Ilista ang ibang mga problema, kung wala, pakilagay ang N/A.)</label>
                      <input type="text" value="<?= $q11; ?>" readonly name="q11" placeholder="Answer" class="form-control border-bottom border-dark">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <hr class="mb-1">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <label for="">When did he/she start to...
                      <br>(Kailan nakapagsimulang..)</label>
                      <input type="text" value="<?= $q12; ?>" readonly name="q12" placeholder="Answer" class="form-control border-bottom border-dark">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <hr class="mb-1">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <label for="">Any concerns on toe walking when he/she was more than 3 years old?
                      <br>(Nagkproblema ka ba sa kanyagng pagtingkayad nung siya ay edad 3 - 5?)</label>
                      <input type="text" value="<?= $q13; ?>" readonly name="q13" placeholder="Answer" class="form-control border-bottom border-dark">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <hr class="mb-1">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-md-12">
                      <label for="">Any concerns on his motor skills while he/she was growing up? If yes, please list motor concerns (Ex. Clumsy, difficulty with balance and coordination, delayed in walking, uses wheel chair or needs to be carried around, etc.) If there is none, please put N/A
                        <br>(Ilista ang mga problema sa paglalakad o paggalaw habang siya ay lumalaki) (Hal. Hirap maglakad, laging natutumba, kailangan kargahin, atbp.) 
                        <br>Kung wala, pakilagay ang N/A</label>
                      <input type="text" value="<?= $q14; ?>" readonly name="q14" placeholder="Answer" class="form-control border-bottom border-dark">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-md-12 text-end">
                      <a href="step4-print.php" class="btn btn-primary">Next</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php
          }
        }
        else{
    ?>
          <div class="row p-5">
            <div class="col-xxl-12 col-xl-12 col-md-12 col-sm-12 col-12 card d-flex justify-content-center text-center align-items-center" style="height:400px;">
              <img src="../images/currently.jpg" alt="" style="width:400px;">
            </div>
          </div>
    <?php
        }
      }
      
    }
    else{
      ?>
            <div class="row p-5">
              <div class="col-xxl-12 col-xl-12 col-md-12 col-sm-12 col-12 card d-flex justify-content-center text-center align-items-center" style="height:400px;">
                <img src="../images/currently.jpg" alt="" style="width:400px;">
              </div>
            </div>
      <?php
    }
  ?>
</div>
<script>
    // PARA LUMABAS AGAD YUNG MODAL
    //document.addEventListener('DOMContentLoaded', function () {
    //  var myModal = new bootstrap.Modal(document.getElementById('addstudent'));
    //  myModal.show();
    //});

</script>
  
<script>
document.addEventListener('DOMContentLoaded', function() {
  var myModal = new bootstrap.Modal(document.getElementById('staticBackdrop'));
  myModal.show();
});
</script>
<script src="../admin/js/scripts.js?v=<?php echo time(); ?>"></script>
<?php
  include('../admin/includes/footer.php');
?>
