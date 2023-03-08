    <!-- nav bar -->
      <div class="w-100 mb-4 d-flex">
        <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="{{route('admin.dashboard')}}">
          <img src="{{!empty(Auth::user()->image) ? url(Auth::user()->image) : url('images/admins/No_Image.jpg')}}" class="rounded-circle" width="100px" height="90px">
        </a>
      </div>
      <ul class="navbar-nav flex-fill w-100 mb-2">
        <li class="nav-item dropdown">
          <a href="#dashboard" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
            <i class="fe fe-home fe-16"></i>
            <span class="ml-3 item-text">Dashboard</span><span class="sr-only">(current)</span>
          </a>
          <ul class="collapse list-unstyled pl-4 w-100" id="dashboard">
            <li class="nav-item active">
              <a class="nav-link pl-3" href="{{route('admin.dashboard')}}"><span class="ml-1 item-text">Default</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link pl-3" href="{{route('admin.user.index')}}"><span class="ml-1 item-text">Users</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link pl-3" href="{{route('admin.role.index')}}"><span class="ml-1 item-text">Roles</span></a>
            </li>
          </ul>
        </li>
        
        <li class="nav-item w-100">
          <a class="nav-link" href="{{route('admin.profile.edit')}}">
            <i class="fe fe-user fe-16"></i>
            <span class="ml-3 item-text">Profile Management</span>
          </a>
        </li>

      </ul>
      <p class="text-muted nav-heading mt-4 mb-1">
        <span>Setup Components</span>
      </p>
      <ul class="navbar-nav flex-fill w-100 mb-2">
        <li class="nav-item dropdown">
          <a href="#ui-elements" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
            <i class="fe fe-box fe-16"></i>
            <span class="ml-3 item-text">Setup Student</span>
          </a>
          <ul class="collapse list-unstyled pl-4 w-100" id="ui-elements">
            <li class="nav-item">
              <a class="nav-link pl-3" href="{{route('student.class.index')}}"><span class="ml-1 item-text">Student Class</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link pl-3" href="{{route('student.year.index')}}"><span class="ml-1 item-text">Student Year</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link pl-3" href="{{route('student.group.index')}}"><span class="ml-1 item-text">Student Group</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link pl-3" href="{{route('student.shift.index')}}"><span class="ml-1 item-text">Student Shift</span></a>
            </li>
          </ul>
        </li>
       
        <li class="nav-item dropdown">
          <a href="#tables" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
            <i class="fe fe-grid fe-16"></i>
            <span class="ml-3 item-text">Setup Mangement</span>
          </a>
          <ul class="collapse list-unstyled pl-4 w-100" id="tables">
            <li class="nav-item">
              <a class="nav-link pl-3" href="{{route('student.fee_category.index')}}"><span class="ml-1 item-text">Fee Category</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link pl-3" href="{{route('student.fee_category_amount.index')}}"><span class="ml-1 item-text">Cat Fee Amount</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link pl-3" href="{{route('student.exam_type.index')}}"><span class="ml-1 item-text">Exam Type</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link pl-3" href="./table_advanced.html"><span class="ml-1 item-text">Subject</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link pl-3" href="./table_advanced.html"><span class="ml-1 item-text">Assign Subject</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link pl-3" href="./table_advanced.html"><span class="ml-1 item-text">Designation</span></a>
            </li>
           
          </ul>
        </li>

        <li class="nav-item w-100">
          <a class="nav-link" href="widgets.html">
            <i class="fe fe-layers fe-16"></i>
            <span class="ml-3 item-text">Student ID Card</span>
            <span class="badge badge-pill badge-primary">ID</span>
          </a>
        </li>

      </ul>
      <p class="text-muted nav-heading mt-4 mb-1">
        <span>Student & employee</span>
      </p>
      <ul class="navbar-nav flex-fill w-100 mb-2">

        <li class="nav-item dropdown">
          <a href="#contact" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
            <i class="fe fe-calendar fe-16"></i>
            <span class="ml-3 item-text">Student Management</span>
          </a>
          <ul class="collapse list-unstyled pl-4 w-100" id="contact">
            <a class="nav-link pl-3" href="./contacts-list.html"><span class="ml-1">Student Registration</span></a>
            <a class="nav-link pl-3" href="./contacts-grid.html"><span class="ml-1">Student Promotion</span></a>
            <a class="nav-link pl-3" href="./contacts-new.html"><span class="ml-1">Roll Generate</span></a>
            <a class="nav-link pl-3" href="./contacts-new.html"><span class="ml-1">Registration Fee</span></a>
            <a class="nav-link pl-3" href="./contacts-new.html"><span class="ml-1">Student Monthly Fee</span></a>
            <a class="nav-link pl-3" href="./contacts-new.html"><span class="ml-1">Student Exam Fee</span></a>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a href="#contact" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
            <i class="fe fe-book fe-16"></i>
            <span class="ml-3 item-text">Employee management</span>
          </a>
          <ul class="collapse list-unstyled pl-4 w-100" id="contact">
            <a class="nav-link pl-3" href="./contacts-list.html"><span class="ml-1">Employee Registration</span></a>
            <a class="nav-link pl-3" href="./contacts-grid.html"><span class="ml-1">Employee Sallary</span></a>
            <a class="nav-link pl-3" href="./contacts-new.html"><span class="ml-1">Employee Leave</span></a>
            <a class="nav-link pl-3" href="./contacts-new.html"><span class="ml-1">Employee Attendance</span></a>
            <a class="nav-link pl-3" href="./contacts-new.html"><span class="ml-1">Employee Monthly Sallary</span></a>
          </ul>
        </li>

      </ul>
      <p class="text-muted nav-heading mt-4 mb-1">
        <span>Mark & Account Report</span>
      </p>
      <ul class="navbar-nav flex-fill w-100 mb-2">
        <li class="nav-item dropdown">
          <a href="#pages" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
            <i class="fe fe-file fe-16"></i>
            <span class="ml-3 item-text">Mark Management</span>
          </a>
          <ul class="collapse list-unstyled pl-4 w-100 w-100" id="pages">
            <li class="nav-item">
              <a class="nav-link pl-3" href="./page-orders.html">
                <span class="ml-1 item-text">Mark Entry</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link pl-3" href="./page-timeline.html">
                <span class="ml-1 item-text">Mark Edit</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link pl-3" href="./page-timeline.html">
                <span class="ml-1 item-text">Mark Grade</span>
              </a>
            </li>
            
          </ul>
        </li>
        
        <li class="nav-item dropdown">
          <a href="#layouts" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
            <i class="fe fe-layout fe-16"></i>
            <span class="ml-3 item-text">Account Mangement</span>
          </a>
          <ul class="collapse list-unstyled pl-4 w-100" id="layouts">
            <li class="nav-item">
              <a class="nav-link pl-3" href="./index.html"><span class="ml-1 item-text">Student Fee</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link pl-3" href="./index-horizontal.html"><span class="ml-1 item-text">Employee Sallary</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link pl-3" href="./index-boxed.html"><span class="ml-1 item-text">Other Cost</span></a>
            </li>

          </ul>
          <li class="nav-item dropdown">
            <a href="#support" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
              <i class="fe fe-compass fe-16"></i>
              <span class="ml-3 item-text">Report Management</span>
            </a>
            <ul class="collapse list-unstyled pl-4 w-100" id="support">
              <a class="nav-link pl-3" href="./support-center.html"><span class="ml-1">Monthly/Yearly Profit</span></a>
              <a class="nav-link pl-3" href="./support-tickets.html"><span class="ml-1">Marks Sheet</span></a>
              <a class="nav-link pl-3" href="./support-ticket-detail.html"><span class="ml-1">Attendance Report</span></a>
              <a class="nav-link pl-3" href="./support-faqs.html"><span class="ml-1">All Student Result</span></a>
            </ul>
          </li>
        </li>
      </ul>
      <p class="text-muted nav-heading mt-4 mb-1">
        <span>Documentation</span>
        
      </p>
      
