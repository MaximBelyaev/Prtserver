<h2>Активированные</h2>
<?php echo Chtml::link('Добавить 200 лицензионных кодов','#', array('class'=>'btn btn-primary', 'id' => 'button200')); ?>
<?php echo Chtml::link('Добавить 1 лицензионный код', '#', array('class'=>'btn btn-primary', 'id' => 'button1')); ?>
<p>
    <!--<a href="javascript:onoff('block1');"><label for="block1">Показать все коды лицензий</label></a>-->
    <textarea id="hidden-list" rows="25" style="width: 265px; display: none;" onclick="this.select()">
    </textarea>
</p>
<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'user-grid',
    'dataProvider' => $activatedCustomers,
    'columns' => array(
        'site',
        /**array(
        'name'=>'reg_date',
        'value'=>'date("d-m-Y", $data->reg_date)',
        ),**/
        'license',
        'status',
        array(
            'header'=>'Действия',
            'class'=>'CButtonColumn',
            'template'=>'{update}{delete}',
            'buttons'=>array
            (
                'update' => array
                (
                    'label'=>'Редактировать',
                    'options' => array(
                        'class' => "btn btn-success"
                    ),
                    'imageUrl'=>false,
                ),
                'delete' => array
                (
                    'label'=>'Удалить',
                    'options' => array(
                        'class' => "btn btn-danger"
                    ),
                    'imageUrl'=>false,
                ),
            ),
        )
    ),
)); ?>
<script>
    function onoff(t){
        p=document.getElementById(t);
        if(p.style.display=="none"){
            p.style.display="block";}
        else{
            p.style.display="none";}
    }
</script>
<script>
    jQuery(document).ready(function($) {
        $('#button1').on('click', function(event) {
            event.preventDefault();
            $.ajax({
                url: '/customers/Addcode',
                type: 'POST',
                dataType: 'json',
                data: {},
            })
                .done(function(xhr) {
                    console.log(xhr);
                    $('#hidden-list').text(xhr.code);
                    $('#hidden-list').show();
                    ;
                    console.log("success");
                })
                .fail(function(xhr) {
                    console.log(xhr.responseText);
                    console.log("error");
                })
                .always(function(xhr) {
                    console.log("complete");
                });
        });

        $('#button200').on('click', function(event) {
            event.preventDefault();
            $.ajax({
                url: '/customers/Addcodes',
                type: 'POST',
                dataType: 'json',
                data: {},
            })
                .done(function(xhr) {
                    console.log(xhr);
                    var str = '';
                    $.each(xhr.models, function(i, val)
                    {
                        str += val + "\n";
                    });
                    console.log(str);
                    $('#hidden-list').text(str);
                    $('#hidden-list').show();
                    console.log("success");
                })
                .fail(function(xhr) {
                    console.log(xhr.responseText);
                    console.log("error");
                })
                .always(function(xhr) {
                    console.log("complete");
                });
        });
    });
</script>
