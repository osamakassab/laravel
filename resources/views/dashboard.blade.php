<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bootstrap.css">
    <style>
        .navbar {
            background-color: #080f1c;
            /* لون الشريط العلوي */
        }

        .btn-primary {
            background-color: #ffffff;
            /* لون الأزرار الأساسي */
            border-color: #eaeef4;
            /* لون حاشية الأزرار الأساسي */

        }



        .card {
            background-color: #1f2937;
            /* لون البطاقات */
            color: #ffffff;
            /* لون النص داخل البطاقات */
        }

        /* .btn-light.join:hover,
        .btn-light.join:focus {
            background-color: green;
            color: white;
        } */

        .btn-light.Join:hover,
        .btn-light.Join:focus {
            background-color: blue;
            color: white;
        }

        body {
            background-color: #111827;
            /* لون خلفية الجسم */
            color: #333333;
            /* لون النص في الجسم */
            font-family: Arial, sans-serif;
            /* نوع الخط في الجسم */
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark ">
        <div class="container">
            <a class="navbar-brand" href="homepage.html"><img
                    src="https://remove.photos/cache/images/56500d16-5196-4c43-a5d7-a0d608398739.png" alt="logo"
                    width="60" height="60"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-light" href="{{ route('welcome') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a id="myGroupsLink" class="nav-link text-light" href="{{ route('groups.my_groups') }}">My Groups</a>
                    </li>
                    <div class="modal" id="myGroupsModal">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">My Groups :</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal Body - List -->
                                <div class="modal-body">
                                    <div class="row" id="myGroupsList">
                                        <!-- الكروت ستتم إضافتها هنا عبر JavaScript -->
                                    </div>
                                </div>


                                <!-- Modal Footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>

                            </div>
                        </div>
                    </div>

                </ul>
            </div>
        </div>
    </nav>
    <!-- it has a notification buttom for admin -->

    <!-- <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="C:\Users\iT House\Downloads\download-removebg-preview.png"
                    alt="logo" width="60" height="60"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  text-light" href="#">Contact</a>
                    </li>
                </ul>
            </div>
            <button class="btn btn-dark" style="margin-left: 10px; background-color:#080f1c ;">
                <a class="fas fa-bell"> 🔔</a> 
            </button>
        </div>
    </nav> -->
    <div class="container mt-5">
        <div class="row row-cols-3">
            <!-- Card 1 -->
            <div class="col-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold">Group 1</h5>
                        <p class="card-text">This is Group 1.</p>
                        <!-- <a href="#" class="btn btn-light join">Join</a> -->
                        <a href="group_files.html" class="btn btn-light Join">Join</a>

                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold">Group 2</h5>
                        <p class="card-text">This is Group 2.</p>
                        <!-- <a href="#" class="btn btn-light join">Join</a> -->
                        <a href="group_files.html" class="btn btn-light Join"> Join</a>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="col-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold">Group 3</h5>
                        <p class="card-text">This is Group 3.</p>
                        <!-- <a href="#" class="btn btn-light join">Join</a> -->
                        <a href="group_files.html" class="btn btn-light Join"> Join</a>


                    </div>
                </div>
            </div>
            <!-- Card 4 -->

            <div class=" col-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold">Group 4</h5>
                        <p class="card-text">This is Group 3.</p>
                        <!-- <a href="#" class="btn btn-light join">Join</a> -->
                        <a href="group_files.html" class="btn btn-light Join">Join</a>

                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="fixed-bottom text-right p-3  " data-toggle="modal" data-target="#myModal">
        <a href = "{{ route ('groups.create') }}" class="btn btn-light rounded-circle btn-md" style="font-size: 17px;">
            <i class="fas fa-plus">
                Add Group

            </i>
        </a>
    </div>
    <!-- </button> -->

    <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title ">Add Group</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="name">Group Name:</label>
                            <input type="text" class="form-control" id="name">
                        </div>
                        <div class="form-group">
                            <label for="email">Description:</label>
                            <input type="email" class="form-control" id="email">
                        </div>
                        <!-- Add more fields here -->
                    </form>
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-light bg-primary">Create</button>
                </div>

            </div>
        </div>
    </div>
    </footer>
    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.js"></script>
</body>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.getElementById("myGroupsLink").addEventListener("click", function () {
            var myGroupsList = document.getElementById("myGroupsList");
            myGroupsList.innerHTML = ""; // استبدال القائمة الحالية بكروت جديدة

            var groups = [
                { title: "Group 1", description: "This is Group 1." },
                { title: "Group 2", description: "This is Group 2." },
                { title: "Group 3", description: "This is Group 3." },
                { title: "Group 4", description: "This is Group 4." },
                { title: "Group 5", description: "This is Group 5." },

            ]; // يمكنك استبدالها بالكروت الخاصة بك

            groups.forEach(function (group) {
                var cardItem = document.createElement("div");
                cardItem.classList.add("col-md-6"); // استخدم Grid System لتحديد حجم الكروت
                cardItem.innerHTML = `
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title font-weight-bold">${group.title}</h5>
                            <p class="card-text">${group.description}</p>
                            <a href="group_files.html" class="btn btn-light Join">Open</a>
                        </div>
                    </div>
                `;
                myGroupsList.appendChild(cardItem);
            });

            // عرض الـ modal
            $('#myGroupsModal').modal('show');
        });
    });
</script>

</html>