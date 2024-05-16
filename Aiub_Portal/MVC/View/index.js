document.addEventListener("DOMContentLoaded", function() {
    var salaryInput = document.getElementById('salary');
    var bonusInput = document.getElementById('bonus');
    var totalSalaryInput = document.getElementById('total_salary');

    function calculateTotalSalary() {
        var salary = parseFloat(salaryInput.value) || 0;
        var bonus = parseFloat(bonusInput.value) || 0;
        var totalSalary = salary + bonus;
        totalSalaryInput.value = totalSalary;
    }

    salaryInput.addEventListener('input', calculateTotalSalary);
    bonusInput.addEventListener('input', calculateTotalSalary);
});


document.addEventListener("DOMContentLoaded", function() {
    var settingIcon = document.querySelector('.setting-link');
    var settingsMenu = document.getElementById('settings-menu');

    settingIcon.addEventListener('click', function(event) {
        if (settingsMenu.style.display === 'block') {
            settingsMenu.style.display = 'none';
        } else {
            settingsMenu.style.display = 'block';
        }
        event.stopPropagation();
    });

    document.addEventListener('click', function(event) {
        if (!settingsMenu.contains(event.target) && settingsMenu.style.display === 'block') {
            settingsMenu.style.display = 'none';
        }
    });
});


function validateAddBookForm() {
    var name = document.getElementById('name').value;
    var author = document.getElementById('author').value;
    var category = document.getElementById('category').value;

    if (name.trim() === '' || author.trim() === '' || category.trim() === '') {
        alert('Please fill in all fields.');
        return false;
    }
    return true;
}
function validateAddCourseForm() {
    var courseName = document.getElementById('course_name').value;
    var section = document.getElementById('section').value;
    var capacity = document.getElementById('capacity').value;
    var weekday = document.getElementById('weekday').value;
    var startTime = document.getElementById('start_time').value;
    var endTime = document.getElementById('end_time').value;

    
    if (courseName.trim() === '' || section.trim() === '' || capacity.trim() === '' || weekday.trim() === '' || startTime.trim() === '' || endTime.trim() === '') {
        alert('Please fill in all fields.');
        return false;
    }

    return true;
}

function validateAddHRForm() {
    var HRName = document.getElementById("HRName").value;
    var FatherName = document.getElementById("FatherName").value;
    var MotherName = document.getElementById("MotherName").value;
    var BloodGroup = document.getElementById("BloodGroup").value;
    var Address = document.getElementById("Address").value;
    var Religion = document.getElementById("Religion").value;
    var MaritalStatus = document.getElementById("MaritalStatus").value;
    var JoiningDate = document.getElementById("JoiningDate").value;
    var Nationality = document.getElementById("Nationality").value;

    
    if (HRName === "" || FatherName === "" || MotherName === "" || BloodGroup === "" || Address === "" || Religion === "" || MaritalStatus === "" || JoiningDate === "" || Nationality === "") {
        alert("All fields must be filled out");
        return false;
    }
    return true;
}

function validateAddRegistrarForm() {
    var RegisterName = document.getElementById("RegisterName").value;
    var fathername = document.getElementById("fathername").value;
    var mothername = document.getElementById("mothername").value;
    var dob = document.getElementById("dob").value;
    var sex = document.getElementById("sex").value;
    var address = document.getElementById("address").value;
    var religion = document.getElementById("religion").value;
    var marital_status = document.getElementById("marital_status").value;
    var nationality = document.getElementById("nationality").value;
    var blood_group = document.getElementById("blood_group").value;
    var joining_date = document.getElementById("joining_date").value;
    var salary = document.getElementById("salary").value;

    if (RegisterName === "" || fathername === "" || mothername === "" || dob === "" || sex === "" || address === "" || religion === "" || marital_status === "" || nationality === "" || blood_group === "" || joining_date === "" || salary === "") {
        alert("All fields must be filled out");
        return false;
    }
    return true;
}

function validateAddStudentForm() {
    
    var student_name = document.getElementById("student_name").value;
    var blood_group = document.getElementById("blood_group").value;
    var father_name = document.getElementById("father_name").value;
    var mother_name = document.getElementById("mother_name").value;
    var department = document.getElementById("department").value;
    var address = document.getElementById("address").value;
    var nationality = document.getElementById("nationality").value;
    var sex = document.getElementById("sex").value;
    var religion = document.getElementById("religion").value;
    var dob = document.getElementById("dob").value;
    var marital_status = document.getElementById("marital_status").value;
    var admission_date = document.getElementById("admission_date").value;

    
    if (student_name === "" || blood_group === "" || father_name === "" || mother_name === "" || department === "" || address === "" || nationality === "" || sex === "" || religion === "" || dob === "" || marital_status === "" || admission_date === "") {
        
        alert("All fields must be filled out");
        return false;
    }
    
    return true;
}

function validateAddTeacherForm() {
    var name = document.getElementById("name").value;
    var fathername = document.getElementById("fathername").value;
    var mothername = document.getElementById("mothername").value;
    var dob = document.getElementById("dob").value;
    var sex = document.getElementById("sex").value;
    var address = document.getElementById("address").value;
    var religion = document.getElementById("religion").value;
    var marital_status = document.getElementById("marital_status").value;
    var nationality = document.getElementById("nationality").value;
    var blood_group = document.getElementById("blood_group").value;
    var department = document.getElementById("department").value;
    var joining_date = document.getElementById("joining_date").value;
    var salary = document.getElementById("salary").value;

    if (name === "" || fathername === "" || mothername === "" || dob === "" || sex === "" || address === "" || religion === "" || marital_status === "" || nationality === "" || blood_group === "" || department === "" || joining_date === "" || salary === "") {
        alert("All fields must be filled out");
        return false;
    }
    return true;
}

function validateAddUserForm() {
    var userId = document.getElementById("user_id").value;
    var role = document.getElementById("role").value;
    var password = document.getElementById("password").value;
    var email = document.getElementById("email").value;
    var phone = document.getElementById("phone").value;

    if (userId === "" || role === "" || password === "" || email === "" || phone === "") {
        alert("All fields must be filled out");
        return false;
    }
    return true;
}

function resetCount() {
    if (confirm("Are you sure you want to reset the count?")) {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    location.reload();
                } else {
                    console.error('Error: ' + xhr.status);
                }
            }
        };
        xhr.open('POST', '');
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send('reset_count=true');
    }
}


function closeCourse(courseid) {
    if (confirm("Are you sure you want to close this course?")) {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    location.reload();
                } else {
                    console.error('Error: ' + xhr.status);
                }
            }
        };
        xhr.open('POST', '');
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send('close_class_id=' + courseid);
    }
}

function openCourse(courseid) {
    if (confirm("Are you sure you want to open this course?")) {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    location.reload();
                } else {
                    console.error('Error: ' + xhr.status);
                }
            }
        };
        xhr.open('POST', '');
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send('open_class_id=' + courseid);
    }
} 

function addCourse(usersId) {
    window.location.href = "registrar_add_course_controller.php?users_id=" + usersId;
}

function redirectToApplyLeave(userId) {
    window.location.href = "registrar_request_leave_controller.php?users_id=" + userId;
}


function redirectToAddBook(userId) {
    window.location.href = "registrar_add_book_controller.php?users_id=" + userId;
}


function checkout(resourceId, userId) {
    window.location.href = "registar_checkout_book_controller.php?users_id=" + userId + "&resourceId=" + resourceId;
}


function bookReceived(resourceId, userId) {
var xhr = new XMLHttpRequest();
xhr.open("POST", "registrar_manage_library_resource_controller.php", true); 
xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
xhr.onreadystatechange = function() {
if (xhr.readyState == 4 && xhr.status == 200) {
    location.reload();
}
};
xhr.send("resourceId=" + resourceId + "&users_id=" + userId); 
}

function addUser(users_id) {
    window.location.href = "registrar_add_user_controller.php?users_id=" + users_id;
}


function changeInfo(users_id, id) {
    window.location.href = "registrar_change_account_info_controller.php?users_id=" + users_id + "&id=" + id;
}
   
   function showEditForm(fieldName) {
    document.getElementById(fieldName).style.display = "none";
    document.getElementById("edit-" + fieldName + "-form").style.display = "block";
}


function saveEdit(fieldName) {
    var newValue = document.getElementById("edit-" + fieldName + "-input").value;
    document.getElementById(fieldName).innerText = newValue;
    document.getElementById(fieldName).style.display = "inline";
    document.getElementById("edit-" + fieldName + "-form").style.display = "none";
}


function cancelEdit(fieldName) {
    document.getElementById(fieldName).style.display = "inline";
    document.getElementById("edit-" + fieldName + "-form").style.display = "none";
}


document.addEventListener("DOMContentLoaded", function() {
    var leaveForm = document.querySelector('.apply-leave-form form');
    var reasonInput = document.getElementById('reason');
    var startDateInput = document.getElementById('start-date');
    var endDateInput = document.getElementById('end-date');

    leaveForm.addEventListener('submit', function(event) {

        if (reasonInput.value.trim() === '') {
            
            alert('Please provide a reason for leave.');
            event.preventDefault();
        }

        if (startDateInput.value === '') {
            
            alert('Please select a start date.');
            event.preventDefault();
        }

        if (endDateInput.value === '') {
            
            alert('Please select an end date.');
            event.preventDefault();
        }

        var startDate = new Date(startDateInput.value);
        var endDate = new Date(endDateInput.value);
        if (endDate < startDate) {
            
            alert('End date should be after start date.');
            event.preventDefault();
        }
    });
});

function redirectToStudentDetails(userId, studentId) {
    window.location.href = "registrar_student_info_details_controller.php?users_id=" + userId + "&student_id=" + studentId;
}

function redirectToTeacherDetails(usersId, id) {
    window.location.href = "registrar_teacher_info_details_controller.php?users_id=" + usersId + "&teacher_id=" + id;
}


function leftTeacher(teacherId, button) {
    if (confirm("Are you sure you want to mark this teacher as left?")) {
        button.disabled = true;
        var formData = new FormData();
        formData.append('left_teacher_id', teacherId);

        fetch(window.location.href, {
            method: 'POST',
            body: formData 
        })
        .then(response => {
            console.log(response);
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }
}

function handleChangeSemester(semester, userId) {
    window.location.href = "student_course_and_results_controller.php?users_id=" + userId + "&semester=" + encodeURIComponent(semester);
}
window.onload = function() {
    var firstCourse = document.getElementById("CourseDropDown").options[0].value;
    showCourseDetails(firstCourse);
};
function handleDropCourseChangeSemester(semester, userId) {
    window.location.href = "student_drop_course_controller.php?users_id=" + userId + "&semester=" + encodeURIComponent(semester);
}


document.addEventListener("DOMContentLoaded", function() {
    
    var paymentForm = document.getElementById('paymentForm');
    var amountToPayInput = document.getElementById('amountToPay');
    var dues = parseFloat(document.getElementById('dues').textContent);

    paymentForm.addEventListener('submit', function(event) {
        var amountToPay = parseFloat(amountToPayInput.value);
        if (isNaN(amountToPay)) {
            alert('Please enter a valid amount.');
            event.preventDefault();
        } else if (amountToPay > dues) {
            alert('Entered amount should not be more than dues.');
            event.preventDefault();
        }
    });
});


function filterResources() {
    var courseFilter = document.getElementById("courseFilter");
    var resourceRows = document.querySelectorAll(".student-resources tbody tr");

    var selectedCourse = courseFilter.value;

    
    resourceRows.forEach(function(row) {
        var courseName = row.querySelector("td:first-child").innerText;

        if (selectedCourse === "" || selectedCourse === courseName) {
            row.style.display = "table-row";
        } else {
            row.style.display = "none";
        }
    });
}


document.addEventListener("DOMContentLoaded", function() {
    var noticeForm = document.querySelector('.add-notice-form form');
    var courseSelect = document.getElementById('course');
    var noticeContent = document.getElementById('notice_content');

    noticeForm.addEventListener('submit', function(event) {
        
        if (courseSelect.value === '') {
            alert('Please select a course.');
            event.preventDefault();
        }
        
        if (noticeContent.value.trim() === '') {
            alert('Please enter notice content.');
            event.preventDefault();
        }
    });
});
function upload(userId) {
    window.location.href = "teacher_add_notice_controller.php?users_id=" + userId;
}


document.addEventListener("DOMContentLoaded", function() {
    var leaveForm = document.querySelector('.apply-leave-form form');
    var reasonInput = document.getElementById('reason');
    var startDateInput = document.getElementById('start-date');
    var endDateInput = document.getElementById('end-date');

    leaveForm.addEventListener('submit', function(event) {
        if (reasonInput.value.trim() === '') {
            alert('Please provide a reason for leave.');
            event.preventDefault();
        }

        if (startDateInput.value === '') {
            alert('Please select a start date.');
            event.preventDefault();
        }

        if (endDateInput.value === '') {
            alert('Please select an end date.');
            event.preventDefault();
        }

        var startDate = new Date(startDateInput.value);
        var endDate = new Date(endDateInput.value);
        if (endDate < startDate) {
            alert('End date should be after start date.');
            event.preventDefault();
        }
    });
});

function uploadResource(userId) {
    window.location.href = "teacher_upload_resource_controller.php?users_id=" + userId;
}


function getParameterByName(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, '\\$&');
    var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, ' '));
}


function handleChangeSemesterTeacher(semester, userId) {
    var courseSelect = document.getElementById("CourseDropDown");
    var selectedCourse = courseSelect.value;
    var selectedSection = selectedCourse.substring(selectedCourse.lastIndexOf("[") + 1, selectedCourse.lastIndexOf("]")).trim();
    var course = selectedCourse.substring(0, selectedCourse.lastIndexOf("[")).trim();

    var newCourse;

    fetch(`teacher_submit_grade_controller_2.php?users_id=${userId}&semester=${semester}`)
        .then(res => res.json()) 
        .then(data => {
            newCourse = data.course + ' [' + data.section + ']';
            window.location.href = "teacher_submit_grade_controller.php?users_id=" + userId + "&semester=" + encodeURIComponent(semester) + "&course=" + encodeURIComponent(newCourse);
        });
}


function handleChangeCourse(course, userId) {
    var semester = document.getElementById("SemesterDropDown").value;
    window.location.href = "teacher_submit_grade_controller.php?users_id=" + userId + "&semester=" + encodeURIComponent(semester) + "&course=" + encodeURIComponent(course);
}


function uploadGrade(userId, studentId, course, section, semester) {
    window.location.href = "teacher_upload_marks_controller.php?users_id=" + encodeURIComponent(userId) + "&student_id=" + encodeURIComponent(studentId) + "&course=" + encodeURIComponent(course) + "&section=" + encodeURIComponent(section) + "&semester=" + encodeURIComponent(semester);
}


document.addEventListener("DOMContentLoaded", function() {
    const midInputs = {
        quiz1: document.querySelector('input[name="mid_quiz1"]'),
        quiz2: document.querySelector('input[name="mid_quiz2"]'),
        bestQuiz: document.querySelector('input[name="mid_best_quiz"]'),
        assignment: document.querySelector('input[name="mid_assignment"]'),
        attendance: document.querySelector('input[name="mid_attendance"]'),
        written: document.querySelector('input[name="mid_written"]'),
        grade: document.querySelector('input[name="mid_grade"]')
    };

    const finalInputs = {
        quiz1: document.querySelector('input[name="final_quiz1"]'),
        quiz2: document.querySelector('input[name="final_quiz2"]'),
        bestQuiz: document.querySelector('input[name="final_best_quiz"]'),
        assignment: document.querySelector('input[name="final_assignment"]'),
        attendance: document.querySelector('input[name="final_attendance"]'),
        written: document.querySelector('input[name="final_written"]'),
        grade: document.querySelector('input[name="final_grade"]')
    };

    Object.values(midInputs).forEach(input => {
        if (input !== midInputs.bestQuiz && input !== midInputs.grade) {
            input.addEventListener("input", () => updateGrade(midInputs));
        }
    });

    Object.values(finalInputs).forEach(input => {
        if (input !== finalInputs.bestQuiz && input !== finalInputs.grade) {
            input.addEventListener("input", () => updateGrade(finalInputs));
        }
    });

    updateGrade(midInputs);
    updateGrade(finalInputs);

    function updateGrade(inputs) {
        const bestQuiz = calculateBestQuiz(inputs.quiz1.value, inputs.quiz2.value);
        inputs.bestQuiz.value = bestQuiz;
        const grade = calculateGrade(inputs.assignment.value, inputs.attendance.value, inputs.written.value, bestQuiz);
        inputs.grade.value = grade;
    }

    function calculateBestQuiz(quiz1, quiz2) {
        const parsedQuiz1 = parseFloat(quiz1) || 0;
        const parsedQuiz2 = parseFloat(quiz2) || 0;
        return Math.max(parsedQuiz1, parsedQuiz2);
    }

    function calculateGrade(assignment, attendance, written, bestQuiz) {
        const parsedAssignment = parseFloat(assignment) || 0;
        const parsedAttendance = parseFloat(attendance) || 0;
        const parsedWritten = parseFloat(written) || 0;
        return parsedAssignment + parsedAttendance + parsedWritten + bestQuiz;
    }
});

function togglePasswordVisibility(icon) {
    const passwordInput = icon.previousElementSibling;
    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        icon.innerHTML = '<i class="fas fa-eye-slash"></i>';
    } else {
        passwordInput.type = "password";
        icon.innerHTML = '<i class="fas fa-eye"></i>';
    }
}

function redirectToHrTeacherDetails(id, userId) {
    window.location.href = "hr_teacher_Info_details_controller.php?users_id=" + userId + "&teacher_id=" + id;
}

function showSuccessMessage() {
    var successMessageDropdown = document.getElementById("successMessageDropdown");
    successMessageDropdown.style.display = "block";
    setTimeout(function(){ 
        successMessageDropdown.style.display = "none";
    }, 4000);
}

function validateForm(event) {
    var userId = document.getElementById("users_id").value.trim();
    var password = document.getElementById("password").value.trim();

    if (userId === "" || password === "") {
        event.preventDefault(); 
        displayErrorMessage("Please enter both User ID and Password.");
    }
}

function displayErrorMessage(message) {
    var errorMessageContainer = document.querySelector(".error-message");
    errorMessageContainer.innerText = message;
}

document.querySelector("form").addEventListener("submit", validateForm);



document.addEventListener("DOMContentLoaded", function() {

    function validateForm() {
        var userId = document.getElementById("users_id").value;
        var password = document.getElementById("password").value;

        if (userId.trim() === '' || password.trim() === '') {
            alert("Please fill out all fields");
            return false; 
        }

        return true; 
    }

    document.querySelector(".form-container form").addEventListener("submit", function(event) {

        if (!validateForm()) {
            event.preventDefault(); 
        }
    });
});



document.addEventListener("DOMContentLoaded", function() {

    function validateForm() {
        var newPassword = document.getElementById("new_password").value;
        var confirmPassword = document.getElementById("confirm_password").value;

        if (newPassword.trim() === '' || confirmPassword.trim() === '') {
            alert("Please fill out all fields");
            return false; 
        }

        return true; 
    }

    document.querySelector(".form-container form").addEventListener("submit", function(event) {

        if (!validateForm()) {
            event.preventDefault(); 
        }
    });
});


function togglePasswordVisibilityChangePassword(inputId) {
    const passwordInput = document.getElementById(inputId);
    const icon = passwordInput.nextElementSibling.querySelector('i');
    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
    } else {
        passwordInput.type = "password";
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
    }
}


document.addEventListener("DOMContentLoaded", function() {

    function validateForm() {
        var currentPassword = document.getElementById("current_password").value;
        var newPassword = document.getElementById("new_password").value;
        var confirmPassword = document.getElementById("confirm_password").value;

        if (currentPassword.trim() === '' || newPassword.trim() === '' || confirmPassword.trim() === '') {
            alert("Please fill out all fields");
            return false; 
        }

        return true; 
    }

    document.querySelector(".change-password-form").addEventListener("submit", function(event) {

        if (!validateForm()) {
            event.preventDefault(); 
        }
    });
});