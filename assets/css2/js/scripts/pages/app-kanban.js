function taskCardData(filterStartDate,filterEndDate) {
  'use strict';
  if($("#fp-range").val()!="")
  {
    var dateRange = $("#fp-range").val();
    var filterStartDate = dateRange.split(" to ")[0];
    var filterEndDate = dateRange.split(" to ")[1];
  }else
  {
    let dates = new Date();
    let d = dates.getDate();
    let m = dates.getMonth();
    let y = dates.getFullYear();
    if(d<10)
        d = '0'+d;
    if(m<10)
        m = '0'+m;
    var filterStartDate = y+'-'+m+'-'+d;
    var filterEndDate = y+'-'+m+'-'+d;
  }

  if($("#filterEmployeeList").val()!=""){
    var filterEmployeeId = $("#filterEmployeeList").val()
  }else{
    var filterEmployeeId = "";
  }

  if($("#filterProjectList").val()!=""){
    var filterProjectId = $("#filterProjectList").val()
  }else{
    var filterProjectId = "";
  }

  var boards,
    openSidebar = true,
    kanbanWrapper = $('.kanban-wrapper'),
    sidebar = $('.update-item-sidebar'),
    datePicker = $('#end_date'),
    startDate = $('#start_date'),
    select2 = $('.select2'),
    employee = $('#employee'),
    project = $('#project'),
    projectModule = $('#module'),
    commentEditor = $('.comment-editor'),
    attachmentsShow = $('#fileView'),
    addNewForm = $('.add-new-board'),
    updateItemSidebar = $('.update-item-sidebar'),
    addNewInput = $('.add-new-board-input');

  var assetPath = '../../../app-assets/';
  if ($('body').attr('data-framework') === 'laravel') {
    assetPath = $('body').attr('data-asset-path');
  }

  // Get Data
  // $.ajax({
  //   type: 'GET',
  //   dataType: 'json',
  //   async: false,
  //   url: assetPath + 'data/kanban.json',
  //   success: function (data) {
  //     boards = data;
  //   }
  // });


  $.ajax({
    type: 'POST',
    data: {'startDate':filterStartDate,'endDate':filterEndDate,'employee_id':filterEmployeeId,'project_id':filterProjectId},
    async: false,
    url: 'http://eofficeapi.iotasonl.com/api/Task_master/getTaskList_ForCardWeb',
    headers:{
      'x-api-key':'admin@123'
    },
    success: function (data) {

      var main_array = [];
      var c_date = new Date();
      var not_started = {};
      not_started.id = 1;
      not_started.title = 'Not Started';
      not_started.item = [];

      var in_progress = {};
      in_progress.id = 2;
      in_progress.title = 'In Progress';
      in_progress.item = [];

      var completed = {};
      completed.id = 3;
      completed.title = 'Competed';
      completed.item = [];

      var dealyed = {};
      dealyed.id = 4;
      dealyed.title = 'Delayed';
      dealyed.item = [];

      // var others = {};
      // others.id = 5;
      // others.title = 'Others';
      // others.item = [];

      let curretValue;
      let attachments = "";
      let attachmentsFile = "";
      $.each(data.data,function(index,value){
            curretValue = {};
            var task_start_date = new Date(value.task_start_date);
            var task_complition_date = new Date(value.task_complition_date);
            
            if(value.attachment!=null){
              attachmentsFile = (value.attachment).split(",");
              attachments = (value.attachment).split(",").length;
            }else{
              attachments = "0";
            }

            curretValue.id = value.assignment_id+"-"+value.id;
            curretValue.title = value.task_title;
            curretValue.badge_text = value.project_name;
            curretValue.start_date = value.task_start_date;
            curretValue.comments = value.task_start_date+","+value.task_complition_date;
            curretValue.end_date = value.task_complition_date;
            curretValue.employee_id = value.employee_id;
            curretValue.employee_name = value.name;
            curretValue.project = value.project_id;
            curretValue.module_id = value.module_id;
            curretValue.attachments = attachments;
            curretValue.attachments_file = value.attachment;
            curretValue.assigned = [
                "avatar-s-1.jpg",
                "avatar-s-2.jpg"
              ];
            curretValue.remarks = value.remarks;
            curretValue.members = ["Bruce", "Dianna"];
            if(value.action == 'notstart'){
              curretValue.badge = "info";
              not_started.item.push(curretValue);
            }
            else if(value.action == 'inprogress'){
              curretValue.badge = "warning";
              in_progress.item.push(curretValue);
            }
            else if(value.action =='completed'){
              curretValue.badge = "success";
              completed.item.push(curretValue);
            }
            else if(value.action =='delay'){
              curretValue.badge = "danger";
              dealyed.item.push(curretValue);
            }
            // else{
            //   curretValue.badge = "primary";
            //   others.item.push(curretValue);
            // }
      });
      main_array.push(not_started);
      main_array.push(in_progress);
      main_array.push(completed);
      main_array.push(dealyed);
      // main_array.push(others);
      boards = main_array;
    }
  });


  // Toggle add new input and actions
  addNewInput.toggle();

  // datepicker init
  if (datePicker.length) {
    datePicker.flatpickr({
      monthSelectorType: 'static',
      altInput: true,
      altFormat: 'j F, Y',
      dateFormat: 'Y-m-d',
      disableMobile: "true"
    });
  }

  if (startDate.length) {
    startDate.flatpickr({
      monthSelectorType: 'static',
      altInput: true,
      altFormat: 'j F, Y',
      dateFormat: 'Y-m-d',
      disableMobile: "true"
    });
  }

  // select2
  if (select2.length) {
    function renderLabels(option) {
      if (!option.id) {
        return option.text;
      }
      var $badge = "<div class='badge badge-light-warning badge-pill'> " + option.text + '</div>';
      // var $badge = "<div class='badge " + $(option.element).data('color') + " badge-pill'> " + option.text + '</div>';

      return $badge;
    }

    select2.each(function () {
      var $this = $(this);
      $this.wrap("<div class='position-relative'></div>").select2({
        placeholder: 'Select',
        dropdownParent: $this.parent(),
        templateResult: renderLabels,
        templateSelection: renderLabels,
        escapeMarkup: function (es) {
          return es;
        }
      });
    });
  }

  // Comment editor
  if (commentEditor.length) {
    new Quill('.comment-editor', {
      modules: {
        toolbar: '.comment-toolbar'
      },
      placeholder: 'Write a Comment... ',
      theme: 'snow'
    });
  }

  // Render board dropdown
  function renderBoardDropdown() {
    return (
      "<div class='dropdown'>" +
      feather.icons['more-vertical'].toSvg({
        class: 'dropdown-toggle cursor-pointer font-medium-3 mr-0',
        id: 'board-dropdown',
        'data-toggle': 'dropdown',
        'aria-haspopup': 'true',
        'aria-expanded': 'false'
      }) +
      // "<div class='dropdown-menu dropdown-menu-right' aria-labelledby='board-dropdown'>" +
      // "<a class='dropdown-item delete-board' href='javascript:void(0)'> " +
      // feather.icons['trash'].toSvg({ class: 'font-medium-1 align-middle' }) +
      // "<span class='align-middle ml-25'>Delete</span></a>" +
      // "<a class='dropdown-item' href='javascript:void(0)'>" +
      // feather.icons['edit'].toSvg({ class: 'font-medium-1 align-middle' }) +
      // "<span class='align-middle ml-25'>Rename</span></a>" +
      // "<a class='dropdown-item' href='javascript:void(0)'>" +
      // feather.icons['archive'].toSvg({ class: 'font-medium-1 align-middle' }) +
      // "<span class='align-middle ml-25'>Archive</span></a>" +
      // '</div>' +
      '</div>'
    );
  }

  // Render item dropdown
  function renderDropdown() {
    return (
      "<div class='dropdown item-dropdown px-1'>" +
      feather.icons['more-vertical'].toSvg({
        class: 'dropdown-toggle cursor-pointer mr-0 font-medium-1',
        id: 'item-dropdown',
        ' data-toggle': 'dropdown',
        'aria-haspopup': 'true',
        'aria-expanded': 'false'
      }) +
      "<div class='dropdown-menu dropdown-menu-right' aria-labelledby='item-dropdown'>" +
      // "<a class='dropdown-item' href='javascript:void(0)'>Copy task link</a>" +
      // "<a class='dropdown-item' href='javascript:void(0)'>Duplicate task</a>" +
      "<a class='dropdown-item delete-task' href='javascript:void(0)'>Delete</a>" +
      '</div>' +
      '</div>'
    );
  }
  // Render header
  function renderHeader(color, text) {
    return (
      "<div class='d-flex justify-content-between flex-wrap align-items-center mb-1'>" +
      "<div class='item-badges'> " +
      "<div class='badge badge-pill badge-light-" +
      color +
      "'> " +
      text +
      '</div>' +
      '</div>' +
      renderDropdown() +
      '</div>'
    );
  }

  // Render employee badge
  function renderEmpBadge(text) {
    return (
      "<div class='item-badges'> " +
      
      '</div>'
    );
  }

  // Render avatar
  function renderAvatar(images, pullUp, margin, members, size) {
    var $transition = pullUp ? ' pull-up' : '',
      member = members !== undefined ? members.split(',') : '';

    return images !== undefined
      ? images
          .split(',')
          .map(function (img, index, arr) {
            var $margin = margin !== undefined && index !== arr.length - 1 ? ' mr-' + margin + '' : '';

            return (
              "<li class='avatar kanban-item-avatar" +
              ' ' +
              $transition +
              ' ' +
              $margin +
              "'" +
              "data-toggle='tooltip' data-placement='top'" +
              "title='" +
              member[index] +
              "'" +
              '>' +
              "<img src='" +
              assetPath +
              'images/portrait/small/' +
              img +
              "' alt='Avatar' height='" +
              size +
              "'>" +
              '</li>'
            );
          })
          .join(' ')
      : '';
  }

  // Render footer
  function renderFooter(attachments, comments, assigned, members, employee_name) {
    return (
      "<div class='d-flex justify-content-between align-items-center flex-wrap mt-50'>" +
      "<div style='width: 100%!important;'> <span class='align-middle mr-25'>" +
      feather.icons['paperclip'].toSvg({ class: 'font-medium-1 align-middle mr-25' }) +
      "<span class='attachments align-middle'>" +
      attachments +
      '</span>' +
      "</span> <span class='align-middle' style='font-size:8px;margin-left:-5px;'>"+
      '<button type="button" class="btn btn-icon btn-icon rounded-circle btn-flat-success"  data-toggle="tooltip" data-placement="top" title="" data-original-title="Start- '+comments.split(",")[0]+' , End- '+comments.split(",")[1]+'">'+
      '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg></button>'+
      '</span>'+
      '<span class="float-right mt-75" style="max-width: 160px;display: flex;">'+
      '<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-check"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><polyline points="17 11 19 13 23 9"></polyline></svg>'+
      "<div class='badge badge-pill badge-light-info' style='display: inline-block;width: 85%;overflow: hidden !important;text-overflow: ellipsis;margin-left: 10px;'> " +
      employee_name +
      '</div>' +
      '<span>'+
      '</span></div>' +
      '</div>'
    );
  }

  // for months name
  Date.prototype.getMonthText = function() {
    var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    return months[this.getMonth()];
  }

  // Init kanban
  var kanban = new jKanban({
    element: '.kanban-wrapper',
    gutter: '15px',
    widthBoard: '250px',
    dragItems: true,
    boards: boards,
    dragBoards: true,
    addItemButton: true,
    buttonContent: '+ Add Item',
    click: function (el) {
      var el = $(el);
      var startData ;
      var endDate ;
      var assignment_id = el.attr('data-eid');
      var title = el.attr('data-eid') ? el.find('.kanban-text').text() : el.text(),
        endDate = el.attr('data-end_date'),
        dateObj = new Date(endDate),
        dateObj2 = new Date(),

        endDateToUse = (endDate == "null" || endDate === undefined)
          ? dateObj2.getDate()+"  "+dateObj2.getMonthText()+", "+dateObj2.getFullYear()
          : dateObj.getDate()+"  "+dateObj.getMonthText()+", "+dateObj.getFullYear(),

        endDate = (endDate == "null" || endDate === undefined)
          ? dateObj2.getFullYear()+"-"+(dateObj2.getMonth()+1)+"-"+dateObj2.getDate()
          : endDate,


        startData = el.attr('data-start_date'),
        dateObj = new Date(startData),
        startDateToUse = (startData=="null" || startData === undefined)
          ? dateObj2.getDate()+"  "+dateObj2.getMonthText()+", "+dateObj2.getFullYear()
          : dateObj.getDate()+"  "+dateObj.getMonthText()+", "+dateObj.getFullYear(),

        startData = (startData=="null" || startData === undefined)
          ? dateObj2.getFullYear()+"-"+(dateObj2.getMonth()+1)+"-"+dateObj2.getDate()
          : startData,

        label = el.attr('data-badge_text'),
        employeeId = el.attr('data-employee_id'),
        projectId = el.attr('data-project'),
        moduleId = el.attr('data-module_id'),
        remarks = el.attr('data-remarks'),
        avatars = el.attr('data-assigned');

      if (el.find('.kanban-item-avatar').length) {
        el.find('.kanban-item-avatar').on('click', function (e) {
          e.stopPropagation();
        });
      }

      if (!$('.dropdown').hasClass('show') && openSidebar) {
        sidebar.modal('show');
      }
      sidebar.find('.update-item-form').on('submit', function (e) {
        e.preventDefault();
      });
      

      $("#taskId").val(el.attr('data-eid'));
      $("#moduleIdBind").val(moduleId);
      sidebar.find('#title').val(title);
      sidebar.find('#end_date_hidden').val(endDate);
      sidebar.find('#start_date_hidden').val(startData);
      sidebar.find('#old_assigned_user').val(employeeId);
      sidebar.find('#assignedID').val(assignment_id);
      sidebar.find(datePicker).next('.form-control').val(endDateToUse);
      sidebar.find(startDate).next('.form-control').val(startDateToUse);
      sidebar.find(employee).val(employeeId).trigger('change');
      sidebar.find(project).val(projectId).trigger('change');
      sidebar.find(commentEditor).html("");
      sidebar.find(commentEditor).html(remarks);
      sidebar.find(attachmentsShow).html("");
      getAttachment(el.attr('data-attachments_file'));
      getTaskActivity();
      
      // $(project).on('change', function(){
        // sidebar.find(projectModule).val(moduleId).trigger('change');
      // })
      // console.log(moduleId)
      // sidebar.find(select2).val(label).trigger('change');
      sidebar.find('.assigned').empty();
      sidebar
        .find('.assigned')
        .append(
          renderAvatar(avatars, false, '50', el.attr('data-members'), 32) +
            "<li class='avatar avatar-add-member ml-50'>" +
            "<span class='avatar-content'>" +
            feather.icons['plus'].toSvg({ class: 'avatar-icon' }) +
            '</li>'
        );
    },
    buttonClick: function (el, boardId) {
      var addNew = document.createElement('form');
      addNew.setAttribute('class', 'new-item-form');
      addNew.innerHTML =
        '<div class="form-group mb-1">' +
        '<textarea class="form-control add-new-item" rows="2" placeholder="Add Content" required></textarea>' +
        '</div>' +
        '<div class="form-group mb-2">' +
        '<button type="submit" class="btn btn-primary btn-sm mr-1">Add</button>' +
        '<button type="button" class="btn btn-outline-secondary btn-sm cancel-add-item">Cancel</button>' +
        '</div>';
      kanban.addForm(boardId, addNew);
      addNew.querySelector('textarea').focus();
      addNew.addEventListener('submit', function (e) {
        e.preventDefault();
        var currentBoard = $(".kanban-board[data-id='" + boardId + "']");
        kanban.addElement(boardId, {
          title: "<span class='kanban-text'>" + e.target[0].value + '</span>',
          id: " -"+boardId + '-' + currentBoard.find('.kanban-item').length + 1
        });
        currentBoard.find('.kanban-item:last-child .kanban-text').before(renderDropdown());
        addNew.remove();
      });
      $(document).on('click', '.cancel-add-item', function () {
        $(this).closest(addNew).toggle();
      });
    },
    dragEl: function (el, source) {
      $(el).find('.item-dropdown, .item-dropdown .dropdown-menu.show').removeClass('show');
    }
  });

  if (kanbanWrapper.length) {
    new PerfectScrollbar(kanbanWrapper[0]);
  }

  // Render add new inline with boards
  $('.kanban-container').append(addNewForm);

  // Change add item button to flat button
  $.each($('.kanban-title-button'), function () {
    $(this).removeClass().addClass('kanban-title-button btn btn-flat-secondary btn-sm ml-50');
    Waves.init();
    Waves.attach("[class*='btn-flat-']");
  });

  // Makes kanban title editable
  $(document).on('mouseenter', '.kanban-title-board', function () {
    $(this).attr('contenteditable', 'false');
  });

  // Appends delete icon with title
  $.each($('.kanban-board-header'), function () {
    $(this).append(renderBoardDropdown());
  });

  // Deletes Board
  $(document).on('click', '.delete-board', function () {
    var id = $(this).closest('.kanban-board').data('id');
    kanban.removeBoard(id);
  });

  // Delete task
  $(document).on('click', '.delete-task', function () {
    var id;
    $(this).closest('.kanban-item').data('eid')? id = $(this).closest('.kanban-item').data('eid') : id = $("#taskId").val();
    let task_id = id.split("-")[1];
    let assignment_id = id.split("-")[0];
    let postData ={status:"0"};
    let logined_user = $("#logined_user").val();
    swal({
      title: "Are you sure?",
      text: "Once task deleted, you will not be able to recover this task!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        $.ajax({
          type: 'POST',
          async: false,
          url: 'http://eofficeapi.iotasonl.com/api/Task_master/deleteTaskMaster',
          headers:{
            'x-api-key':'admin@123'
          },
          data:{"task_id":task_id,"data":postData, "assignment_id":assignment_id, "logined_user":logined_user},
          success: function (res) {
            if(res.response_code==200){
               swal("Task Deleted Successfully!!", {
                icon: "success",
              });
               location.reload();
            }else{
              swal("Something Went Wrong..", {
                icon: "warning",
              });
            }
          }
        });
      } else {
        swal("Your task is safe!");
      }
    });
    // kanban.removeElement(id);
  });

  // Open/Cancel add new input
  $('.add-new-btn, .cancel-add-new').on('click', function () {
    addNewInput.toggle();
  });

  // Add new board
  addNewForm.on('submit', function (e) {
    e.preventDefault();
    var $this = $(this),
      value = $this.find('.form-control').val(),
      id = value.replace(/\s+/g, '-').toLowerCase();
    kanban.addBoards([
      {
        id: id,
        title: value
      }
    ]);
    // Adds delete board option to new board & updates data-order
    $('.kanban-board:last-child').find('.kanban-board-header').append(renderBoardDropdown());

    // Remove current append new add new form
    addNewInput.val('').css('display', 'none');
    $('.kanban-container').append(addNewForm);

    // Update class & init waves
    $.each($('.kanban-title-button'), function () {
      $(this).removeClass().addClass('kanban-title-button btn btn-flat-secondary btn-sm ml-50');
      Waves.init();
      Waves.attach("[class*='btn-flat-']");
    });
  });

  // Clear comment editor on close
  // sidebar.on('hidden.bs.modal', function () {
  //   sidebar.find('.ql-editor')[0].innerHTML = '';
  //   sidebar.find('.nav-link-activity').removeClass('active');
  //   sidebar.find('.tab-pane-activity').removeClass('show active');
  //   sidebar.find('.nav-link-update').addClass('active');
  //   sidebar.find('.tab-pane-update').addClass('show active');
  // });

  // Re-init tooltip when modal opens(Bootstrap bug)
  sidebar.on('shown.bs.modal', function () {
    $('[data-toggle="tooltip"]').tooltip();
  });

  $('.update-item-form').on('submit', function (e) {
    e.preventDefault();
    sidebar.modal('hide');
  });

  // Render custom items
  $.each($('.kanban-item'), function () {
    var $this = $(this),
      $text = "<span class='kanban-text' style='font-size:13px;' >" + $this.text() + '</span>';
    if ($this.attr('data-badge') !== undefined && $this.attr('data-badge_text') !== undefined) {
      $this.html(renderHeader($this.attr('data-badge'), $this.attr('data-badge_text')) + $text);
    }
    if (
      $this.attr('data-comments') !== undefined ||
      $this.attr('data-end_date') !== undefined ||
      $this.attr('data-start_date') !== undefined ||
      $this.attr('data-assigned') !== undefined ||
      $this.attr('data-employee_id') !== undefined ||
      $this.attr('data-module_id') !== undefined
    ) {
      $this.append(
        renderFooter(
          $this.attr('data-attachments'),
          $this.attr('data-comments'),
          $this.attr('data-assigned'),
          $this.attr('data-members'),
          $this.attr('data-employee_name')
        )
      );
    }
    
    if ($this.attr('data-image') !== undefined) {
      $this.html(
        renderHeader($this.attr('data-badge'), $this.attr('data-badge_text')) +
          "<img class='img-fluid rounded mb-50' src='" +
          assetPath +
          'images/slider/' +
          $this.attr('data-image') +
          "' height='32'/>" +
          $text +
          renderFooter(
            $this.attr('data-start_date'),
            $this.attr('data-end_date'),
            $this.attr('data-comments'),
            $this.attr('data-assigned'),
            $this.attr('data-members'),
            $this.attr('data-employee_name')
          )
      );
    }
    $this.on('mouseenter', function () {
      $this.find('.item-dropdown, .item-dropdown .dropdown-menu.show').removeClass('show');
    });
  });

  if (updateItemSidebar.length) {
    updateItemSidebar.on('hidden.bs.modal', function () {
      updateItemSidebar.find('.custom-file-label').empty();
    });
  }

  $("#start_date,#end_date").change(function(e){
      if(e.target.id=='start_date')
        $("#start_date_hidden").val($(this).val());
      else if(e.target.id=='end_date')
        $("#end_date_hidden").val($(this).val());
  });
}

