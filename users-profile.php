<script>
  localStorage.setItem("skills", '[]');
</script>
<?php session_start();
include('./setting/dbconnection.php');
// get university from the database
$university = "SELECT * FROM university_master";
$u_result = $conn->query($university);
$u_result1 = $conn->query($university);

$id = $_SESSION['user_id'];
$sql1 = "SELECT * FROM register WHERE id = $id";
$result1 = $conn->query($sql1);
$row = $result1->fetch_assoc();

$skills = "SELECT * FROM skills WHERE user_id = $id";
// echo $skills;
// exit(0);
$result = $conn->query($skills);
$skill_list = [];
while ($row1 = $result->fetch_assoc()) {
  array_push($skill_list, $row1['skill']);
}

?>
<script>
  let skills = ['<?php echo implode(",", $skill_list) ?>'];
  let skills_array = skills[0].split(",");
  if (skills_array[0] != '') {
    localStorage.setItem("skills", JSON.stringify(skills_array));
  }
</script>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Users / Profile</title>
  <?php
  include("./include/head.php");
  ?>
  <style>
    .hide {
      display: none;
    }

    .point:hover {
      cursor: pointer;
    }

    .input-group-text {
      width: 5rem;
    }
  </style>
</head>

<body>
  <div class="profile_updated hide" aria-live="polite" aria-atomic="true" style="position: relative; z-index: 2; top: -50px;">
    <div class="row no-gutters col-md-3" style="position: absolute; top: 100px; right: 0px;">
      <div class="col-lg-12 ml-auto">
        <div class="alert alert-success fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="True">&times;</span>
          </button>
          <h4 class="alert-heading">Successfuly</h4>
          <p><?php echo $_SESSION['profile_updated']; ?></p>
        </div>
      </div>
    </div>
  </div>
  <div class="profile_updated_error hide" aria-live="polite" aria-atomic="true" style="position: relative; z-index: 2; top: -50px;">
    <div class="row no-gutters col-md-3" style="position: absolute; top: 100px; right: 0px;">
      <div class="col-lg-12 ml-auto">
        <div class="alert alert-danger fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="True">&times;</span>
          </button>
          <h4 class="alert-heading">Error!</h4>
          <p><?php echo $_SESSION['profile_updated_error']; ?></p>
        </div>
      </div>
    </div>
  </div>
  <!-- ======= Header ======= -->
  <?php
  include("./include/header.php");
  ?>
  <!-- ======= Sidebar ======= -->
  <?php
  include("./include/sidebar.php");
  ?>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Profile</h1>
    </div>

    <section class="section profile">
      <div class="row">
        <div class="col-xl-3">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="<?php if ($row['profile_img'] != NULL) {
                          echo "assets/profile_pic/" . $row['profile_img'];
                        } else {
                          echo 'assets/img/default-profile-pic.jpg';
                        } ?>" alt="Profile" class="rounded-circle">
              <h2><?php echo strtoupper($row['first_name'] . ' ' . $row['last_name']); ?></h2>
              <h3><?php if ($row['post'] == 'none') {
                    echo "Your Post?";
                  } else {
                    echo $row['post'];
                  }  ?></h3>
              <div class="social-links mt-2">
                <a href="<?php echo $row['linkedin_link']; ?>" class="linkedin"><i class="bi bi-linkedin"></i></a>
                <a href="<?php echo $row['twitter_link']; ?>" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="<?php echo $row['facebook_link']; ?>" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="<?php echo $row['instagram_link']; ?>" class="instagram"><i class="bi bi-instagram"></i></a>
              </div>
            </div>
          </div>

        </div>
        <?php
        if ($row['post'] == NULL) {
        ?>
          <div class="col-xl-9">
            <div class="card px-5 py-4">
              <h4>First, Select your Role</h4>
              <form action="./php/controll.php" method="post">
                <div class="card-body pt-5 d-flex justify-content-center">
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="post_name" id="inlineRadio1" value="Mentee" required>
                    <!-- <label class="form-check-label font-weight-bold" for="inlineRadio1">Menti</label> -->
                    <h5>Mentee</h5>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="post_name" id="inlineRadio2" value="Mentor" required>
                    <!-- <label class="form-check-label font-weight-bold" for="inlineRadio2">Mentor</label> -->
                    <h5>Mentor</h5>
                  </div>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary" name="post_btn">Save</button>
                </div>
              </form>
            </div>
          </div>
        <?php
        } else {
          
        ?>
          <div class="col-xl-9">

            <div class="card">
              <div class="card-body pt-3">
                <!-- Bordered Tabs -->
                <ul class="nav nav-tabs nav-tabs-bordered">

                  <li class="nav-item">
                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                  </li>

                  <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                  </li>

                  <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                  </li>

                </ul>
                <div class="tab-content pt-2">

                  <div class="tab-pane fade show active profile-overview" id="profile-overview">
                    <h5 class="card-title">About</h5>
                    <p class="small fst-italic"><?php echo $row['about']; ?></p>

                    <h5 class="card-title">Profile Details</h5>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Full Name</div>
                      <div class="col-lg-9 col-md-8"><?php echo $row['first_name'] . " " . $row['last_name']; ?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">University / Institute</div>
                      <div class="col-lg-9 col-md-8"><?php
                                                      while ($row2 = $u_result1->fetch_assoc()) {
                                                        if ($row['university_id'] == $row2['id']) {
                                                          echo $row2['u_name'];
                                                        }
                                                      }
                                                      ?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Skills</div>
                      <div class="col-lg-9 col-md-8"><?php echo join(', ', $skill_list); ?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Address</div>
                      <div class="col-lg-9 col-md-8"><?php echo $row['a_line1'] . ', ' . $row['a_line2'] . ', ' . $row['a_city'] . ' ' . $row['a_pin'] . ', ' . $row['a_district'] . ', ' . $row['a_state'] . '.'; ?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Phone</div>
                      <div class="col-lg-9 col-md-8"><?php echo $row['p_no']; ?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Email</div>
                      <div class="col-lg-9 col-md-8"><?php echo $row['email']; ?></div>
                    </div>

                  </div>

                  <div class="tab-pane show profile-edit pt-3" id="profile-edit">

                    <!-- Profile Edit Form -->
                    <form action="./php/controll.php" method="post" id="user_detail_form">
                      <div class="row mb-3">
                        <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                        <div class="col-md-8 col-lg-9">
                          <img src="<?php if ($row['profile_img'] != NULL) {
                                      echo "assets/profile_pic/" . $row['profile_img'];
                                    } else {
                                      echo 'assets/img/default-profile-pic.jpg';
                                    } ?>" alt="Profile">
                          <div class="pt-2">
                            <input type="file" name="upload_image" id="upload_image" accept=".jpg, .png, .jpeg">
                            <a href="./php/remove_img.php?i=<?php echo $row['id']; ?>" class="btn btn-danger" title="Remove my profile image"><i class="bi bi-trash"></i></a>
                            <div id="uploaded_image"></div>
                          </div>
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="firstname" class="col-md-4 col-lg-3 col-form-label">First Name</label>
                        <div class="col-md-8 col-lg-5">
                          <input name="firstname" type="text" class="form-control" id="firstname" value="<?php echo $row['first_name']; ?>">
                        </div>

                      </div>
                      <div class="row mb-3">
                        <label for="lastname" class="col-md-4 col-lg-3 col-form-label">Last Name</label>
                        <div class="col-md-8 col-lg-5">
                          <input name="lastname" type="text" class="form-control" id="lastname" value="<?php echo $row['last_name']; ?>">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="about" class="col-md-4 col-lg-3 col-form-label">About</label>
                        <div class="col-md-8 col-lg-9">
                          <textarea name="about" class="form-control" id="about" maxlength="500" style="height: 100px"><?php echo $row['about']; ?></textarea>
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="company" class="col-md-4 col-lg-3 col-form-label">University / Institute</label>
                        <div class="col-md-8 col-lg-9">
                          <!-- <input name="company" type="text" class="form-control" id="company" value="Lueilwitz, Wisoky and Leuschke"> -->
                          <select class="custom-select" id="inputGroupSelect01" name="university" size="1">
                            <?php
                            $u_id = $row['university_id'];

                            while ($row2 = $u_result->fetch_assoc()) {
                              $data = $row2['u_name'];
                              $id = $row2['id'];
                              echo "<script>console.log($u_id)</script>";
                              echo "<script>console.log($id)</script>";
                              if ($u_id != $id) {
                                echo "<option value='$id'>$data</option>";
                              } else {
                                echo "<option value='$id' selected>$data</option>";
                              }
                            }
                            ?>
                          </select>
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="Job" class="col-md-4 col-lg-3 col-form-label">Skills</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="job" type="text" class="form-control" id="Job" placeholder="Add Your Skills">
                        </div>
                        <input type="text" hidden name="skills_array" id="skills_array">
                      </div>
                      <div class="row mb-4">
                        <label for="Job" class="col-md-4 col-lg-3 col-form-label"></label>
                        <div class="col-md-8 col-lg-9" id="skillsTag">
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                        <div class="col-md-8 col-lg-9">
                          <!-- <input name="address" type="text" class="form-control" id="Address" value="A108 Adam Street, New York, NY 535022"> -->
                          <div class="input-group mb-1">
                            <div class="input-group-prepend">
                              <span class="input-group-text col-lg-20">Line-1</span>
                            </div>
                            <input name="line1" type="text" class="form-control" value="<?php echo $row['a_line1']; ?>" aria-label="Amount (to the nearest dollar)" required>
                          </div>
                          <div class="input-group mb-1">
                            <div class="input-group-prepend">
                              <span class="input-group-text col-lg-20">Line-2</span>
                            </div>
                            <input name="line2" type="text" class="form-control" value="<?php echo $row['a_line2']; ?>" aria-label="Amount (to the nearest dollar)" required>
                          </div>
                          <div class="input-group mb-1">
                            <div class="input-group-prepend">
                              <span class="input-group-text col-lg-20">City</span>
                            </div>
                            <input name="city" type="text" class="form-control" value="<?php echo $row['a_city']; ?>" aria-label="Amount (to the nearest dollar)" required>
                          </div>
                          <div class="input-group mb-1">
                            <div class="input-group-prepend">
                              <span class="input-group-text col-lg-20">Pin</span>
                            </div>
                            <input name="pin" type="text" class="form-control" value="<?php echo $row['a_pin']; ?>" aria-label="Amount (to the nearest dollar)" required>
                          </div>
                          <div class="input-group mb-1">
                            <div class="input-group-prepend">
                              <span class="input-group-text col-lg-20">District</span>
                            </div>
                            <input name="district" type="text" class="form-control" value="<?php echo $row['a_district']; ?>" aria-label="Amount (to the nearest dollar)" required>
                          </div>
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text col-lg-20">State</span>
                            </div>
                            <input name="state" type="text" class="form-control" value="<?php echo $row['a_state']; ?>" aria-label="Amount (to the nearest dollar)" required>
                          </div>
                        </div>

                      </div>

                      <div class="row mb-3">
                        <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="phone" type="text" class="form-control" id="Phone" value="<?php echo $row['p_no']; ?>" minlength="10" maxlength="13">
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="Twitter" class="col-md-4 col-lg-3 col-form-label">Twitter Profile</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="twitter" type="text" class="form-control" id="Twitter" placeholder="<?php echo $row['twitter_link']; ?>">
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="Facebook" class="col-md-4 col-lg-3 col-form-label">Facebook Profile</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="facebook" type="text" class="form-control" id="Facebook" placeholder="<?php echo $row['facebook_link']; ?>">
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="Instagram" class="col-md-4 col-lg-3 col-form-label">Instagram Profile</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="instagram" type="text" class="form-control" id="Instagram" placeholder="<?php echo $row['instagram_link']; ?>">
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="Linkedin" class="col-md-4 col-lg-3 col-form-label">Linkedin Profile</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="linkedin" type="text" class="form-control" id="Linkedin" placeholder="<?php echo $row['linkedin_link']; ?>">
                        </div>
                      </div>

                      <div class="text-center">
                        <button type="submit" class="btn btn-primary" name="edit_profile_btn">Save Changes</button>
                      </div>
                    </form><!-- End Profile Edit Form -->

                  </div>

                  <div class="tab-pane fade pt-3" id="profile-change-password">
                    <!-- Change Password Form -->
                    <form action="./php/controll.php" method="POST">

                      <div class="row mb-3">
                        <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                        <div class="col-md-8 col-lg-9">
                          <input required name="currentpass" type="password" placeholder="Password" class="password-register form-control" id="password-register" minlength="8">
                        </div>
                      </div>
                      
                      <div class="row mb-3">
                        <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                        <div class="col-md-8 col-lg-9">
                          <input required name="newpassword" type="password" placeholder="Password" class="password-register form-control" id="password-register" minlength="8">
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                        <div class="col-md-8 col-lg-9">
                          <input required name="renewpassword" type="password" placeholder="Confirm Password" class="passwordConfirmation form-control" id="passwordConfirmation" minlength="8">
                        </div>
                      </div>

                      <div class="text-center">
                        <button type="submit" class="btn btn-primary" name="change_pass_u">Change Password</button>
                      </div>
                    </form><!-- End Change Password Form -->

                  </div>

                </div><!-- End Bordered Tabs -->

              </div>
            </div>

          </div>
        <?php
        }
        ?>
      </div>
    </section>
    <div id="uploadimageModal" class="modal" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h3>Crop Profile picture</h3>
            <button type="button" class="close" data-dismiss="modal"><i class="fa fa-close"></i></button>
          </div>

          <div class="modal-body">
            <div class="row">
              <div class="col-md-8 text-center">
                <div id="image_demo" style="width:350px; margin-top:30px"></div>
              </div>

              <div class="col-md-4" style="padding-top:30px;"><br><br><br>

              </div>
            </div>
          </div>

          <div class="modal-footer">
            <button class="btn btn-success" style="background-color: blue;" id="crop_image">Crop</button>
          </div>
        </div>
      </div>
    </div>
  </main><!-- End #main -->
  <script>
    $(document).ready(function() {

      $image_crop = $('#image_demo').croppie({
        enableExif: true,
        viewport: {
          width: 250,
          height: 250,
          type: 'square'
        },
        boundary: {
          width: 300,
          height: 300
        }
      });

      $('#upload_image').on('change', function() {
        var reader = new FileReader();
        reader.onload = function(event) {
          $image_crop.croppie('bind', {
            url: event.target.result
          }).then(function() {
            console.log('jQuery bind complete');
          });
        }
        reader.readAsDataURL(this.files[0]);
        $('#uploadimageModal').modal('show');
      });

      $('#crop_image').click(function(event) {
        $image_crop.croppie('result', {
          type: 'canvas',
          size: 'viewport'
        }).then(function(response) {
          $.ajax({
            url: "./php/crop_img.php",
            type: "POST",
            data: {
              "image": response
            },
            success: function(data) {
              $('#uploadimageModal').modal('hide');
              $('#uploaded_image').html(data);
            }
          });
        });
      });

    });

    function nextPage() {
      $.ajax({
        method: "POST",
        url: "./next.php",
        data: {
          skillList: JSON.parse(localStorage.getItem("skills"))
        },
      }).done(function(response) {
        console.log(response);
      });
    }
    document.getElementById("Job").addEventListener("keypress", (e) => {
      if (e.key == "Enter") {
        addSkill();
      }
    });
    displaySkills();

    function addListeners() {
      let tags = document.getElementsByClassName("point");
      let t1 = "";
      for (let i = 0; i < tags.length; i++) {
        tags[i].addEventListener("click", (e) => {
          let t = tags[i].parentElement.innerHTML;
          t1 = t.slice(0, t.indexOf("&"));
          removeSkill(t1);
        });
      }
    }

    function removeSkill(t1) {
      let skills = JSON.parse(localStorage.getItem("skills"));
      skills.splice(skills.indexOf(t1), 1);
      localStorage.setItem("skills", JSON.stringify(skills));
      displaySkills();
    }

    function addSkill() {
      let skills;
      if (localStorage.getItem("skills") != 'undefined') {
        skills = JSON.parse(localStorage.getItem("skills"));
      } else {
        skills = [];
      }
      skill = document.getElementById("Job");
      skillText = skill.value;
      if (skillText != "") {
        skill.value = "";
        skills.push(skillText);
        localStorage.setItem("skills", JSON.stringify(skills));

        displaySkills();
      }

    }

    function displaySkills() {
      let skills;
      if (localStorage.getItem("skills") != 'undefined') {
        skills = JSON.parse(localStorage.getItem("skills"));
      } else {
        skills = [];
      }

      skillsList = skills
        .map((i) => {
          return `<span class='p-1 badge badge-primary m-1'><h6>${i}&nbsp;&nbsp;<span class='point badge badge-light'>X</span></h6></span>`;
        })
        .join("\n");
      document.getElementById("skillsTag").innerHTML = skillsList;
      let array_skills = document.getElementById("skills_array");
      if (localStorage.getItem("skills") != 'undefined') {
        array_skills.value = JSON.parse(localStorage.getItem("skills"));
      } else {
        skillList = '';
      }
      addListeners();
    }
    $("form").keypress(function(e) {
      if (e.keyCode == 13) {
        e.preventDefault();
        return false;
      }
    });
  </script>
  <?php
  include("./include/footer.php");
  include("./include/backtotop.php");
  include("./include/script.php");
  ?>
</body>

</html>

<?php
if (isset($_SESSION['profile_updated'])) {
?>
  <script>
    function addHide() {
      var element = document.getElementsByClassName("profile_updated")[0];
      element.classList.add("hide");
    }
    var element = document.getElementsByClassName("profile_updated")[0];
    element.classList.remove("hide");
    const myTimeout = setTimeout(addHide, 2000);
  </script>
<?php
  unset($_SESSION['profile_updated']);
}
if (isset($_SESSION['profile_updated_error'])) {
?>
  <script>
    function addHide() {
      var element = document.getElementsByClassName("profile_updated_error")[0];
      element.classList.add("hide");
    }
    var element = document.getElementsByClassName("profile_updated_error")[0];
    element.classList.remove("hide");
    const myTimeout = setTimeout(addHide, 2000);
  </script>
<?php
  unset($_SESSION['profile_updated_error']);
}
?>