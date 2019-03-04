var presa=[];
var pres=$('#pres');

$(document).ready(function() {
    $('#students').DataTable();

    $('#medicineTable').on('click', '#del', function() {
        var row_index = $(this).closest("tr").index();
        delete presa[row_index-1];
        pres.val(presa);
        // swal("Are you sure to delete?");
        $(this).closest('tr').remove();
    });

    $('#add_disease').click(function () {
        var activeEditor = tinyMCE.get('diseases');
        var disease=$('#disease').val();
        var content =  activeEditor.getContent();
        var dis=content+"<li>"+disease+"</li>";
        activeEditor.setContent(dis);
        $('#disease').val('');
    });

    $('#add_test').click(function () {
        var activeEditor = tinyMCE.get('tests');
        var disease=$('#test').val();
        var content =  activeEditor.getContent();
        var dis=content+"<li>"+disease+"</li>";
        activeEditor.setContent(dis);
        $('#test').val('');
    });

    var i=0;
    $('#add_medicine').click(function () {
        var m_type=$('#medicine_type').val();
        var m_name=$('#medicine_name').val();
        var m_dose=$('#dose').val();
        var m_note=$('#note').val();

        i++;
        var data = '<tr><td><span><i class="icofont-bin" id="del"></i></span></td><td><sup>'+m_type+'</sup> '+m_name+'</td><td>\n' +
            '           '+m_dose+'</td><td>'+m_note+'</td></tr>';

        var pdata = '"<tr><td><sup>'+m_type+'</sup> '+m_name+'</td><td>'+m_dose+'</td><td>'+m_note+'</td></tr>"';
        // var medicines = '<tr><td><sup>'+m_type+'</sup> '+m_name+'</td><td>'+m_dose+'</td><td>'+m_note+'</td></tr>';


        presa.push(pdata);
        pres.val(presa);

        $('#medicineTable tr:last').after(data);

        $('#medicine_type').val('');
        $('#medicine_name').val('');
        $('#dose').val('');
        $('#note').val('');



    });



    // tinymce
    tinymce.init({
        selector: '#diseases',
        menubar: false,
        plugins: "lists",
        toolbar: 'bold italic | numlist bullist'
    });

    tinymce.init({
        selector: '#tests',
        menubar: false,
        plugins: "lists",
        toolbar: 'bold italic | numlist bullist'
    });

    tinymce.init({
        selector: '#medicines',
        menubar: false,
        plugins: "lists, table",
        toolbar: 'bold italic | numlist bullist | table'
    });

    tinymce.init({
        selector: '#advices',
        menubar: false,
        plugins: "lists, table",
        toolbar: 'bold italic | numlist bullist | table'
    });




});
