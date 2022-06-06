/*=========================================================================================
    File Name: app-todo.js
    Description: app-todo
    ----------------------------------------------------------------------------------------
    Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

'use strict';

$(function () {
  var taskTitle,
    start_date = $('.start_date'),
    end_date = $('.end_date'),
    newTaskModal = $('.sidebar-todo-modal'),
    newTaskForm = $('#form-modal-todo'),
    favoriteStar = $('.todo-item-favorite'),
    modalTitle = $('.modal-title'),
    addBtn = $('.add-todo-item'),
    addTaskBtn = $('.add-task button'),
    updateTodoItem = $('.update-todo-item'),
    updateBtns = $('.update-btn'),
    taskDesc = $('#task-desc'),
    taskAssignSelect = $('#task-assigned'),
    taskTag = $('#task-tag'),
    overlay = $('.body-content-overlay'),
    menuToggle = $('.menu-toggle'),
    sidebarToggle = $('.sidebar-toggle'),
    sidebarLeft = $('.sidebar-left'),
    sidebarMenuList = $('.sidebar-menu-list'),
    todoFilter = $('#todo-search'),
    sortAsc = $('.sort-asc'),
    sortDesc = $('.sort-desc'),
    todoTaskList = $('.todo-task-list'),
    todoTaskListWrapper = $('.todo-task-list-wrapper'),
    listItemFilter = $('.list-group-filters'),
    noResults = $('.no-results'),
    checkboxId = 100;

  var assetPath = '../../../app-assets/';
  if ($('body').attr('data-framework') === 'laravel') {
    assetPath = $('body').attr('data-asset-path');
  }

  // if it is not touch device
  if (!$.app.menu.is_touch_device()) {
    if (sidebarMenuList.length > 0) {
      var sidebarListScrollbar = new PerfectScrollbar(sidebarMenuList[0], {
        theme: 'dark'
      });
    }
    if (todoTaskListWrapper.length > 0) {
      var taskListScrollbar = new PerfectScrollbar(todoTaskListWrapper[0], {
        theme: 'dark'
      });
    }
  }
  // if it is a touch device
  else {
    sidebarMenuList.css('overflow', 'scroll');
    todoTaskListWrapper.css('overflow', 'scroll');
  }

  // Add class active on click of sidebar filters list
  if (listItemFilter.length) {
    listItemFilter.find('a').on('click', function () {
      if (listItemFilter.find('a').hasClass('active')) {
        listItemFilter.find('a').removeClass('active');
      }
      $(this).addClass('active');
    });
  }

  // Init D'n'D
  var dndContainer = document.getElementById('todo-task-list');
  if (typeof dndContainer !== undefined && dndContainer !== null) {
    dragula([dndContainer], {
      moves: function (el, container, handle) {
        return handle.classList.contains('drag-icon');
      }
    });
  }

  // Main menu toggle should hide app menu
  if (menuToggle.length) {
    menuToggle.on('click', function (e) {
      sidebarLeft.removeClass('show');
      overlay.removeClass('show');
    });
  }

  // Todo sidebar toggle
  if (sidebarToggle.length) {
    sidebarToggle.on('click', function (e) {
      e.stopPropagation();
      sidebarLeft.toggleClass('show');
      overlay.addClass('show');
    });
  }

  // On Overlay Click
  if (overlay.length) {
    overlay.on('click', function (e) {
      sidebarLeft.removeClass('show');
      overlay.removeClass('show');
      $(newTaskModal).modal('hide');
    });
  }

  // Assign task
  function assignTask(option) {
    if (!option.id) {
      return option.text;
    }
    var $person =
      '<div class="media align-items-center">' +
      '<img class="d-block rounded-circle mr-50" src="' +
      $(option.element).data('img') +
      '" height="26" width="26" alt="' +
      option.text +
      '">' +
      '<div class="media-body"><p class="mb-0">' +
      option.text +
      '</p></div></div>';

    return $person;
  }

  // Task Assign Select2
  // if (taskAssignSelect.length) {
  //   taskAssignSelect.wrap('<div class="position-relative"></div>');
  //   taskAssignSelect.select2({
  //     placeholder: 'Unassigned',
  //     dropdownParent: taskAssignSelect.parent(),
  //     templateResult: assignTask,
  //     templateSelection: assignTask,
  //     escapeMarkup: function (es) {
  //       return es;
  //     }
  //   });
  // }

  // Task Tags
  if (taskTag.length) {
    taskTag.wrap('<div class="position-relative"></div>');
    taskTag.select2({
      placeholder: 'Select tag'
    });
  }

  // Favorite star click
  if (favoriteStar.length) {
    $(favoriteStar).on('click', function () {
      $(this).toggleClass('text-warning');
    });
  }

  // Start Date
  if (start_date.length) {
    start_date.flatpickr({
      dateFormat: 'Y-m-d',
      defaultDate: 'today',
      onReady: function (selectedDates, dateStr, instance) {
        if (instance.isMobile) {
          $(instance.mobileInput).attr('step', null);
        }
      }
    });
  }

  // End Date
  if (end_date.length) {
    end_date.flatpickr({
      dateFormat: 'Y-m-d',
      defaultDate: 'today',
      onReady: function (selectedDates, dateStr, instance) {
        if (instance.isMobile) {
          $(instance.mobileInput).attr('step', null);
        }
      }
    });
  }

  // Todo Description Editor
  if (taskDesc.length) {
    var todoDescEditor = new Quill('#task-desc', {
      bounds: '#task-desc',
      modules: {
        formula: true,
        syntax: true,
        toolbar: '.desc-toolbar'
      },
      placeholder: 'Write Your Description',
      theme: 'snow'
    });
  }

  Date.prototype.getMonthName = function() {
      var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
      return months[this.getMonth()];
    }

  // On add new item button click, clear sidebar-right field fields
  if (addTaskBtn.length) {
    addTaskBtn.on('click', function (e) {
      addBtn.removeClass('d-none');
      updateBtns.addClass('d-none');
      modalTitle.text('Add Task');
      // newTaskModal.modal('show');
      sidebarLeft.removeClass('show');
      overlay.removeClass('show');
      newTaskModal.find('.new-todo-item-title').val('');
      var quill_editor = taskDesc.find('.ql-editor');
      quill_editor[0].innerHTML = '';
    });
  }

  // Add New ToDo List Item

  // To add new todo form
  if (newTaskForm.length) {
    newTaskForm.validate({
      ignore: '.ql-container *', // ? ignoring quill editor icon click, that was creating console error
      rules: {
        todoTitleAdd: {
          required: true
        },
        'task-assigned': {
          required: true
        },
        'task-due-date': {
          required: true
        }
      }
    });

    newTaskForm.on('submit', function (e) {
      e.preventDefault();
      var isValid = newTaskForm.valid();
      if (isValid) {
        checkboxId++;
        var assignedTo = $('#task-assigned').val(),
          todoBadge = '',
          membersImg = {
            'Phill Buffer': assetPath + 'images/portrait/small/avatar-s-3.jpg',
            'Chandler Bing': assetPath + 'images/portrait/small/avatar-s-1.jpg',
            'Ross Geller': assetPath + 'images/portrait/small/avatar-s-4.jpg',
            'Monica Geller': assetPath + 'images/portrait/small/avatar-s-6.jpg',
            'Joey Tribbiani': assetPath + 'images/portrait/small/avatar-s-2.jpg',
            'Rachel Green': assetPath + 'images/portrait/small/avatar-s-11.jpg'
          };

        var todoTitle = $('.sidebar-todo-modal .new-todo-item-title').val();
        var date = $('.sidebar-todo-modal .task-due-date').val(),
          selectedDate = new Date(date),
          month = new Intl.DateTimeFormat('en', { month: 'short' }).format(selectedDate),
          day = new Intl.DateTimeFormat('en', { day: '2-digit' }).format(selectedDate),
          todoDate = month + ' ' + day;

        // Badge calculation loop
        var selected = $('.task-tag').val();
        var badgeColor = {
          Team: 'primary',
          Low: 'success',
          Medium: 'warning',
          High: 'danger',
          Update: 'info'
        };
        $.each(selected, function (index, value) {
          todoBadge += '<div class="badge badge-pill badge-light-' + badgeColor[value] + ' mr-50">' + value + '</div>';
        });
        // HTML Output
        if (todoTitle != '') {
          $(todoTaskList).prepend(
            '<li class="todo-item">' +
              '<div class="todo-title-wrapper">' +
              '<div class="todo-title-area">' +
              feather.icons['more-vertical'].toSvg({ class: 'drag-icon' }) +
              '<div class="title-wrapper">' +
              '<div class="custom-control custom-checkbox">' +
              '<input type="checkbox" class="custom-control-input" id="customCheck' +
              checkboxId +
              '" />' +
              '<label class="custom-control-label" for="customCheck' +
              checkboxId +
              '"></label>' +
              '</div>' +
              '<span class="todo-title">' +
              todoTitle +
              '</span>' +
              '</div>' +
              '</div>' +
              '<div class="todo-item-action">' +
              '<div class="badge-wrapper mr-1">' +
              todoBadge +
              '</div>' +
              '<small class="text-nowrap text-muted mr-1">' +
              todoDate +
              '</small>' +
              '<div class="avatar">' +
              '<img src="' +
              membersImg[assignedTo] +
              '" alt="' +
              assignedTo +
              '" height="28" width="28">' +
              '</div>' +
              '</div>' +
              '</div>' +
              '</li>'
          );
        }
        toastr['success']('Data Saved', '💾 Task Action!', {
          closeButton: true,
          tapToDismiss: false
        });
        $(newTaskModal).modal('hide');
        overlay.removeClass('show');
      }
    });
  }

  // Task checkbox change
  todoTaskListWrapper.on('change', '.custom-checkbox', function (event) {
    var values = $(this).closest('li').prop('id').split("-");
    var assignment_id = values[0];
    var emp_id = $("#employee_id").val();;
    var $this = $(this).find('input');
    if ($this.prop('checked')) {
      let postData ={status:"0"};
      swal({
        title: "Are you sure?",
        text: "Once task completed, you will not be able to uncompleted this task!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          $.ajax({
            type: 'POST',
            async: false,
            url: 'http://eofficeapi.iotasonl.com/api/Task_master/completeTask',
            headers:{
              'x-api-key':'admin@123'
            },
            data:{"assignment_id":assignment_id,"completion_per":"100","employee_id":emp_id,"completion_status":"1"},
            success: function (res) {
              if(res.response_code==200){
                //  swal("Task Deleted Successfully!!", {
                //   icon: "success",
                // });
                toastr['success']('Task Completed', 'Congratulations!! 🎉', {
                  closeButton: true,
                  tapToDismiss: false
                });
                location.reload();
              }else{
                // swal("Something Went Wrong..", {
                //   icon: "warning",
                // });
                toastr['warning']('Oops!!', 'Something went wrong!!', {
                  closeButton: true,
                  tapToDismiss: false
                });
              }
            }
          });
        } else {
          swal("Your task is safe!");
        }
      });
    } else {
      $this.closest('.todo-item').removeClass('completed');
    }
  });
  // todoTaskListWrapper.on('click', '.custom-checkbox', function (event) {
  //   event.stopPropagation();
  // });

  // To open todo list item modal on click of item
  $(document).on('click', '.todo-task-list-wrapper .todo-item', function (e) {
    var values = $(this).closest('li').prop('id').split("-");
    var assignment_id = values[0];
    var slider = document.getElementById('pips-range');
    var Data = {'assignment_id':assignment_id,};
    $.ajax({
      type: 'POST',
      async: false,
      data : Data,
      url: 'http://eofficeapi.iotasonl.com/api/Task_master/getTaskList_ForCardWeb',
      headers:{
        'x-api-key':'admin@123'
      },
      success: function (responce) {
          $.each(responce.data,function(index,value){
            
            $("#StaredValue").val(value.favourite);
            get_employee_list(value.task_assigned_by);
            get_project_list(value.project_id);
            get_module_list(value.module_id);

            dateObj = new Date(value.task_start_date);
            var start_date = dateObj.getDate()+"  "+dateObj.getMonthName()+", "+dateObj.getFullYear();
            $("#start_date").val(start_date);
            dateObj = new Date(value.task_complition_date);
            var end_date = dateObj.getDate()+"  "+dateObj.getMonthName()+", "+dateObj.getFullYear();
            $("#end_date").val(end_date);
            get_task_list(value.employee_id,value.project_id,value.module_id,assignment_id);
            $("#comment").html(value.remarks);
            $("#assignment_id").val(value.assignment_id);
            $("#employee_id").val(value.employee_id);
            if(value.favourite==1){
              $(".todo-item-favorite").addClass('text-warning');
            }else{
              $(".todo-item-favorite").removeClass('text-warning');
            }
            if(value.attachment!=""){
              getAttachment(value.attachment);
            }
            slider.noUiSlider.set(value.complition_percentage);
          });
        }
    });
    newTaskModal.modal('show');
    addBtn.addClass('d-none');
    updateBtns.removeClass('d-none');
    if ($(this).hasClass('completed')) {
      modalTitle.html(
        '<button type="button" class="btn btn-sm btn-outline-success complete-todo-item waves-effect waves-float waves-light" data-dismiss="modal">Completed</button>'
      );
    } else {
      modalTitle.html(
        '<button type="button" class="btn btn-sm btn-outline-secondary complete-todo-item waves-effect waves-float waves-light" onclick="markComplete()" data-dismiss="modal">Mark Complete</button>'
      );
    }
    // taskTag.val('').trigger('change');
    // var quill_editor = $('#task-desc .ql-editor'); // ? Dummy data as not connected with API or anything else
    // quill_editor[0].innerHTML =
    //   'Chocolate cake topping bonbon jujubes donut sweet wafer. Marzipan gingerbread powder brownie bear claw. Chocolate bonbon sesame snaps jelly caramels oat cake.';
    // taskTitle = $(this).find('.todo-title');
    var $title = $(this).find('.todo-title').html();

    // apply all variable values to fields
    newTaskForm.find('.new-todo-item-title').val($title);
  });

  // Updating Data Values to Fields
  if (updateTodoItem.length) {
    updateTodoItem.on('click', function (e) {
      var isValid = newTaskForm.valid();
      e.preventDefault();
      if (isValid) {
        var $edit_title = newTaskForm.find('.new-todo-item-title').val();
        $(taskTitle).text($edit_title);

        // toastr['success']('Data Saved', '💾 Task Action!', {
        //   closeButton: true,
        //   tapToDismiss: false
        // });
        $(newTaskModal).modal('hide');
      }
    });
  }

  // Sort Ascending
  if (sortAsc.length) {
    sortAsc.on('click', function () {
      todoTaskListWrapper
        .find('li')
        .sort(function (a, b) {
          return $(b).find('.todo-title').text().toUpperCase() < $(a).find('.todo-title').text().toUpperCase() ? 1 : -1;
        })
        .appendTo(todoTaskList);
    });
  }
  // Sort Descending
  if (sortDesc.length) {
    sortDesc.on('click', function () {
      todoTaskListWrapper
        .find('li')
        .sort(function (a, b) {
          return $(b).find('.todo-title').text().toUpperCase() > $(a).find('.todo-title').text().toUpperCase() ? 1 : -1;
        })
        .appendTo(todoTaskList);
    });
  }

  // Filter task
  if (todoFilter.length) {
    todoFilter.on('keyup', function () {
      var value = $(this).val().toLowerCase();
      if (value !== '') {
        $('.todo-item').filter(function () {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
        var tbl_row = $('.todo-item:visible').length; //here tbl_test is table name

        //Check if table has row or not
        if (tbl_row == 0) {
          if (!$(noResults).hasClass('show')) {
            $(noResults).addClass('show');
          }
        } else {
          $(noResults).removeClass('show');
        }
      } else {
        // If filter box is empty
        $('.todo-item').show();
        if ($(noResults).hasClass('show')) {
          $(noResults).removeClass('show');
        }
      }
    });
  }

  // For chat sidebar on small screen
  if ($(window).width() > 992) {
    if (overlay.hasClass('show')) {
      overlay.removeClass('show');
    }
  }
});

$(window).on('resize', function () {
  // remove show classes from sidebar and overlay if size is > 992
  if ($(window).width() > 992) {
    if ($('.body-content-overlay').hasClass('show')) {
      $('.sidebar-left').removeClass('show');
      $('.body-content-overlay').removeClass('show');
      $('.sidebar-todo-modal').modal('hide');
    }
  }
});
