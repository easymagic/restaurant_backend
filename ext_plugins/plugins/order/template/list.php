<script
  src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
  integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
  crossorigin="anonymous"></script>

<!-- order list -->
<div class="col-xs-12">
	<h3>Created Orders</h3>
</div>

<?php 
  $filter = session('s_filter');
?>
<div class="col-xs-12" align="right">
	

  <b>Date From: </b>&nbsp;
  <input name="" data-date id="date-from" value="<?php echo @$filter['date_created > ']; ?>" required/>
  
  &nbsp;
  
  <b>Date To: </b>&nbsp;
  <input name="" data-date id="date-to" value="<?php echo @$filter['date_created < ']; ?>" required/>
 &nbsp; 
  <button class="btn btn-sm btn-primary" id="filter-dates">Filter Dates</button>
 &nbsp;`

 <?php 
  if (isset($filter['status'])){
    $r = ' data-value = "' . $filter['status'] . '" ';
  }else{
    $r = '';
  }
 ?>

	<select id="filter" <?php echo $r; ?>>
		<option value="">--Filter--</option>
		<option value="">--Reset--</option>
		<option value="2">Pending</option>
		<option value="1">Approved</option>
		<option value="0">Voided</option>
	</select>

  

  <div style="
    text-align: left;
    padding-bottom: 13px;
    padding-top: 12px;
">

	<span>
		<b>Total Amount</b>
	</span>
	<span>
		=N=<?php echo number_format($result['sums']['total_price']); ?>
	</span>
,
	<span>
		<b>Total Qty.</b>
	</span>
	<span>
		<?php echo number_format($result['sums']['total_qty']); ?>
	</span>


  &nbsp;
  <a href="<?php echo base_url(); ?>order/export_csv" class="btn btn-sm btn-success">Export To Excel</a>

  </div>

</div>


<div class="col-xs-12">
	<?php 
      __filter('log_message');
	?>
</div>


<div class="col-xs-12">

	<table class="table" style="font-size: 12px;">
		<tr>
			<th>
				Customer Name
			</th>
			<th>
				Qty.
			</th>
			<th>
				Price
			</th>
			<th>
				Payment Type 
			</th>
			<th>
				Table Location
			</th>
      <th>
        Waiter
      </th>
			<th>
				Status
			</th>
			<th>
				Date Created
			</th>
		</tr>
		<?php 
         foreach ($items as $k=>$v){

         	?>
            
            <tr>
            	<td>
            		<?php echo $v->customer_name; ?>
            	</td>
            	<td>
            		<?php echo $v->total_qty; ?>
            	</td>
            	<td>
            		<?php echo $v->total_price; ?>
            	</td>

            	<td>
            		<?php

                 echo $v->payment_type; 

                 if ($v->payment_type == 'both'){

                  ?>
                  <!-- card -->
                  <small>
                  <div><b>
                    Card: <?php echo number_format($v->card_split_value); ?>
                  </b></div>
                  </small>

                  <!-- cash -->
                  <small>
                  <div><b>
                    Cash: <?php echo number_format($v->cash_split_value); ?>
                  </b></div>
                  </small>

                  <?php 

                 }

                ?>
            	</td>

            	<td>
            		<?php echo __filter('table_name', $v->table_id) ; ?>
            	</td>

              <td>
                <?php echo __filter('admin_user_name', $v->user_id); ?>
              </td>

            	<td>
            		<?php echo __filter('order_status',$v->status); ?>
            	</td>

            	<td>
            		<?php 
                      echo $v->date_created;
            		?>
            	</td>

            	<td>

            		<?php 
                      if ($v->status == 2){
                    ?>
            		<a data-index="<?php echo $k; ?>" data-payment-type="<?php echo $v->payment_type; ?>" data-href="<?php echo base_url(); ?>actions/launch/order/approve/<?php echo $v->id; ?>" class="btn btn-sm btn-success approve">Confirm</a>
            		<a href="<?php echo base_url(); ?>actions/launch/order/void/<?php echo $v->id; ?>" class="btn btn-sm btn-warning confirm">Void</a>
                    <?php 
                      }else if ($v->status == 1){

                        ?>
                <a data-index="<?php echo $k; ?>" data-payment-type="<?php echo $v->payment_type; ?>" data-href="<?php echo base_url(); ?>actions/launch/order/approve/<?php echo $v->id; ?>" class="btn btn-sm btn-primary approve">Re-Confirm</a>

                        <?php 
                      }
            		?>


                <a data-index="<?php echo $k; ?>" data-payment-type="<?php echo $v->payment_type; ?>" href="<?php echo base_url(); ?>actions/launch/order/get_invoice/<?php echo $v->id; ?>" class="btn btn-sm btn-warning">Get Invoice</a>



            		<button data-index="<?php echo $k; ?>" class="btn btn-info detail">Detail</button>
            		
            	</td>
            </tr>

         	<?php 

         }
		?>
	</table>
</div>

<div class="col-xs-12" align="center" style="padding: 11px;">
   <?php 
     if (isset($result['pagination']['firstpage'])){
   ?>
   <a href="?page=<?php echo $result['pagination']['firstpage']; ?>" class="btn btn-default">First</a>
   <?php   
     }
   ?>

   <?php 
     if (isset($result['pagination']['prevpage'])){
   ?>
   <a href="?page=<?php echo $result['pagination']['prevpage']; ?>" class="btn btn-default">Prev</a>
   <?php   
     }
   ?>



   <?php 
     if (isset($result['pagination']['nextpage'])){
   ?>
   <a href="?page=<?php echo $result['pagination']['nextpage']; ?>" class="btn btn-default">Next</a>
   <?php   
     }
   ?>


      <?php 
     if (isset($result['pagination']['lastpage'])){
   ?>
   <a href="?page=<?php echo $result['pagination']['lastpage']; ?>" class="btn btn-default">Last</a>
   <?php   
     }
   ?>

<?php 
if (isset($result['pagination']['firstpage']))
echo " ( Page {$result['pagination']['firstpage']} of {$result['pagination']['lastpage']} ) ";
?>  

</div>

<div id="modal-parent" style="display: none;left: 0px;top: 0px;position: fixed;z-index: 9000;background-color: rgba(0, 0, 0, 0.5);width: 100%;height: 100vh;align-content: center;text-align: center;padding-top: 100px;">
  

<!-- cash -->


   <div style="display: inline-block;width: 300px;min-height: 200px;background-color: #fff;" id="cash-window">
      

      <div align="right">
        <button id="close" class="btn btn-danger">
        X </button>
      </div>

<form method="post" action="">

   <div>
     <h4 style="
    font-weight: bold;
    text-decoration: underline;
">Cash Confirmation</h4>
   </div>


      <div>
        <label>Qty</label>
      </div>
      <div>
        <b id="total_qty"></b>
      </div>

      <div>
        <label>Amount</label>
      </div>
      <div>
        <b id="total_price"></b>
      </div>
      <div>
        <label>Amount Tendered</label>
      </div>
      <div>
        <input type="number" name="amount_tendered" style="text-align: center;margin-bottom: 11px;" placeholder="Amount Tendered" required="" />
      </div>

     
      <div>
        <input style="margin-bottom: 11px;" type="submit" value="Confirm" class="btn btn-primary" />
      </div>

</form>
     
   </div>


<!-- card -->

   <div style="display: inline-block;;width: 300px;min-height: 200px;background-color: #fff;" id="card-window">
     

      <div align="right">
        <button id="close" class="btn btn-danger">
        X </button>
      </div>

<form method="post" action="">

   <div>
     <h4 style="
    font-weight: bold;
    text-decoration: underline;
">Card Confirmation</h4>
   </div>


      <div>
        <label>Qty</label>
      </div>
      <div>
        <b id="total_qty"></b>
      </div>

      <div>
        <label>Amount</label>
      </div>
      <div>
        <b id="total_price"></b>
      </div>

     
      <div>
        <input style="margin-bottom: 11px;" type="submit" value="Confirm" class="btn btn-primary" />
      </div>

</form>



   </div>




<!-- split or both -->

   <div style="display: inline-block;;width: 300px;min-height: 200px;background-color: #fff;" id="both-window">


      <div align="right">
        <button id="close" class="btn btn-danger">
        X </button>
      </div>



<form method="post" action="">

   <div>
     <h4 style="
    font-weight: bold;
    text-decoration: underline;
">Split-Payment(Both) Confirmation</h4>
   </div>


      <div>
        <label>Qty</label>
      </div>
      <div>
        <b id="total_qty"></b>
      </div>

      <div>
        <label>Amount</label>
      </div>
      <div>
        <b id="total_price"></b>
      </div>


      <div>
        <label>Card-Split-Value</label>
      </div>
      <div>
        <b id="card_split_value"></b>
      </div>


      <div>
        <label>Cash-Split-Value</label>
      </div>
      <div>
        <b id="cash_split_value"></b>
      </div>

     
      <div>
        <input style="margin-bottom: 11px;" type="submit" value="Confirm" class="btn btn-primary" />
      </div>

</form>



     
   </div>





<!-- uni window -->
   <div style="display: inline-block;width: 300px;min-height: 200px;background-color: #fff;" id="uni-window">
      

      <div align="right">
        <button id="close" class="btn btn-danger">
        X </button>
      </div>

<form method="post" action="">

   <div>
     <h4 style="
    font-weight: bold;
    text-decoration: underline;
">Order Confirmation</h4>
   </div>


      <div class="col-xs-12">
        <label>Payment Type</label>
      </div>
      <div class="col-xs-12">
        <select id="payment_type1" class="form-control" name="payment_type" required="">
          <option value="cash">--Select Payment Type (Cash Default)--</option>
          <option value="cash">Cash</option>
          <option value="card">Card</option>
          <option value="both">Both/Split Payment</option>
        </select>
      </div>


      <div>
        <label>Qty</label>
      </div>
      <div>
        <b id="total_qty"></b>
      </div>

      <div>
        <label>Amount</label>
      </div>
      <div>
        <b id="total_price"></b>
      </div>

      <div id="cash" style="display: none;">
        
      <div>
        <label>Amount Tendered</label>
      </div>
      <div>
        <input type="number" id="amount_tendered" name="amount_tendered" style="text-align: center;margin-bottom: 11px;" placeholder="Amount Tendered" required="" />
      </div>



      </div>

      <div id="card" style="display: none;">
        
        (Card)
        
      </div>

      <div id="both" style="display: none;">
        

      <div>
        <label>Amount Card</label>
      </div>
      <div>
        <input type="number" id="card_split_value" name="card_split_value" style="text-align: center;margin-bottom: 11px;" placeholder="Amount Card" required="" />
      </div>


      <div>
        <label>Amount Cash</label>
      </div>
      <div>
       <input type="number" id="cash_split_value" name="cash_split_value" style="text-align: center;margin-bottom: 11px;" placeholder="Amount Cash" required="" />
      </div>


      </div>


     
      <div>
        <input style="margin-bottom: 11px;" type="submit" value="Confirm" class="btn btn-primary" />
      </div>

</form>
     
   </div>


<!-- details -->



   <div style="display: inline-block;;width: 300px;min-height: 200px;background-color: #fff;" id="detail-window">


      <div align="right">
        <button id="close" class="btn btn-danger">
        X </button>
      </div>


   <div>
     <h4 style="
    font-weight: bold;
    text-decoration: underline;
">Order Details</h4>
   </div>




<div id="outlet" style="
    height: 251px;
    overflow-y: scroll;
"></div>
<div style="clear: both;">&nbsp;</div>
<div style="
    margin-bottom: 11px;
    padding-top: 14px;
    border-top: 1px solid;
">
  <b id="total"></b>
</div>

     
   </div>




</div>

<script type="text/javascript">
	(function($){

		$(function(){

           $('#filter').on('change',function(){
           	location.href = '<?php echo base_url(); ?>actions/launch/order/save_filter/status/' + $(this).val();
           });



   

    $('.confirm').each(function(){
      $(this).on('click',function(){
        return confirm(" Do you want to confirm this action ? ");
      });
    });


    $('[data-value]').each(function(){
       var vl = $(this).data('value');
       $(this).val(vl);
    });


    $('[data-date]').each(function(){
      $(this).datepicker({ dateFormat: 'yy-mm-dd' });
    });



  

  $('#filter-dates').on('click',function(){
     var date_from = $('#date-from').val();
     var date_to = $('#date-to').val();

     if (date_from!= '' && date_to!= ''){
       location.href = '<?php echo base_url(); ?>actions/launch/order/save_date_filter/' + date_from + '/' + date_to;
     }else{

        $('#date-from').css('border','2px solid red');
        $('#date-to').css('border','2px solid red');

        setTimeout(function(){
          $('#date-from').css('border','1px solid green');
          $('#date-to').css('border','1px solid green');
        },2000);

     }

  });


     
     function handle_cash_card_both_modal(){

      var items = <?php echo json_encode($items); ?>;
      
      var region = 'modal';

      var $modal_parent = $('#modal-parent');
      
      var $cash_window = $('#cash-window');
      var $card_window = $('#card-window');

      var windows_ = ['#card-window','#cash-window','#both-window','#detail-window','#uni-window'];

      function reset_windows($skip){
        $.each(windows_,function(k,v){
          if (v != $skip){
            $(v).hide();
          }else{
            $(v).show();
          }
        });
      }

      function init_regions(){
        $.each(windows_,function(k,v){
 
          $(v).on('mouseover',function(){
            region = v;
            console.log(region);
          }); 


        });        
      }
      
      function show_modal(){
        $modal_parent.show();
      }


      function hide_modal(){
        $modal_parent.hide();
      }

      function handle_close_modal(sel){
       $(sel).find('#close').on('click',function(){
        hide_modal();
       });
      } 

      function update_action(sel,action){
        $(sel).find('form').attr('action',action);
      }

      function update_prop(sel,url,obj){
        handle_close_modal(sel);
        update_action(sel,url);
        $.each(obj,function(k,v){
          if (k == 'total_price'){
            
            var val = +v; 
            window.$total_price = +v;
            $(sel).find('#' + k).html( '=N=' + val.toLocaleString());
          
 
          }else{
           
           $(sel).find('#' + k).html(v);

          }
        });
      }

      function update_detail(sel,obj){
        handle_close_modal(sel);

        var tot = 0;
        $('#outlet').html('');

        $.each(obj,function(k,v){

          console.log(v);

          tot+=(v.price * 1);

          var $tmpl = $($('#list-template').html()).clone();
          $.each(v,function(col,col_Val){
            $tmpl.find('#' + col).html(col_Val);
          });
          $('#outlet').append($tmpl); 

        });

        $('#total').html('Total =N=' + tot.toLocaleString());

      }


      function show_card(obj,url){
         show_modal();
         reset_windows('#card-window');
         update_prop('#card-window',url,obj);

      }

      function show_cash(obj,url){
        show_modal();
        reset_windows('#cash-window');
        update_prop('#cash-window',url,obj);

      }

      function show_split(obj,url){
        show_modal();
        reset_windows('#both-window');
        update_prop('#both-window',url,obj);

      }

      function show_uni(obj,url){
        //uni-window
        show_modal();
        reset_windows('#uni-window');
        update_prop('#uni-window',url,obj);   

        var $parent = $('#uni-window');   

        function calculate_other($ref,sel,cb){
          var vl = +($ref.val());
          var sub_total = $total_price;
          if (isNaN(vl)){
            $ref.val(0);
            $(sel).val(sub_total);

          }else{
            if (vl <= sub_total){
             $(sel).val(sub_total - (+vl));
             if (cb)cb(vl);
            }else{
             $ref.val(0);
             $(sel).val(sub_total);     
            }
          }
        }

        $parent.find('#cash_split_value').on('keyup',function(){
          calculate_other($(this),$parent.find('#card_split_value'),function(calculated_value){

              $parent.find('#amount_tendered').val(calculated_value);

          });
        });



        $parent.find('#cash_split_value').val($total_price);
        $parent.find('#cash_split_value').trigger('keyup');


        $parent.find('#card_split_value').on('keyup',function(){
          calculate_other($(this),$parent.find('#cash_split_value'));
        });


        function reset_all(){
         $parent.find('#cash').hide(); 
         $parent.find('#card').hide();
         $parent.find('#both').hide();
        }

        $parent.find('#payment_type1').on('change',function(){
          
          reset_all();
          $('#' + $(this).val()).show();

        });

        $parent.find('#payment_type1').trigger('change');

      }


      function show_detail(obj){
        show_modal();
        reset_windows('#detail-window');
        update_detail('#detail-window',obj);

      }

       $modal_parent.on('mouseover',function(){
        // region = 'modal';
        // console.log(region);
       }); 


       // $modal_parent.on('click',function(){
       //  if (region == 'modal')$(this).hide();
       // });  

       $('.approve').each(function(){
        
        var url = $(this).data('href');
        var payment_type = $(this).data('payment-type');
        var index = $(this).data('index');
        var json_obj = items[+index];
        var json_items = JSON.parse(json_obj.json_data);



        $(this).on('click',function(){
          
             console.log(json_obj,json_items);

            show_uni(json_obj,url);
            // if (payment_type == 'cash'){
            //  show_cash(json_obj,url);
            // }else if (payment_type == 'card'){
            //  show_card(json_obj,url);
            // }else if (payment_type == 'both'){
            //   show_split(json_obj,url);
            // }


        });



        



       });
       //approve


       $('.detail').each(function(){

        var index = $(this).data('index');
        var json_obj = items[+index];
        var json_items = JSON.parse(json_obj.json_data);

        $(this).on('click',function(){
          show_detail(json_items);
          return false;
        });
       });

       $('#print-option').on('click',function(){
         
         var href = $(this).data('href');
         var newwindow=window.open(href,"Print Receipt.",'height=200,width=459');
         
         if (window.focus) {
           newwindow.focus();
         }

         return false;

       });


     }



     handle_cash_card_both_modal();



		});

	})(jQuery);
</script>
<div style="display: none;" id="list-template">
  <div class="col-xs-12">
    <span>
      <b id="name"></b>
    </span> 
    @ 
    <span>
      <b id="price"></b>
    </span>

  </div>
</div>