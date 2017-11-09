<?php include ("../../../../header.phtml"); ?>
<link rel="stylesheet" href="../../../../src/view/css/stundeninhalt/dayview.css">




<!-- Modal -->

<div class="container">
  <h2>Modal</h2>
  
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>

        <div class="modal-body">          
          <div class="form-group">
            <label for="usr">Name:</label>
            <input type="text" class="form-control" id="usr">            
          </div>
          <div class="form-group">
            <label for="theme">Thema:</label>
            <input type="text" class="form-control" id="usr">            
          </div>
          <div class="form-group">
             <label for="comment">Beschreibung</label>
            <textarea class="form-control" rows="5" id="comment"></textarea>
          </div>          
        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-default pull-left btn-success">Speichern</button>
          <button type="button" class="btn btn-default btn-danger" data-dismiss="modal">Schließen</button>
        </div>

      </div>
      
    </div>
  </div>



  
    <!-- Select Field Klasse auswählen-->
        <select class="selectpicker">
            <option>FIA52</option>                
            <option>FIA53</option>
            <option>FIA54</option>
        </select>



    <br>
    <br>
    <br>

    

    <!-- Table Bewertungsbogen Details -->

    <div class="container col-xs-3">      
    <table class="table">
     <thead>
        <tr>
            <th>Datum</th>
            <th>Bewertung</th>            
        </tr>
     </thead>

    <tbody>
      <tr>
        <td>01.01.2017</td>
        <td>--</td>        
      </tr>
      <tr>
        <td>01.01.2017</td>
        <td>++</td>
      </tr>
      <tr>
        <td>01.01.2017</td>
        <td>NA</td>
      </tr>
      <tr>
        <td>01.01.2017</td>
        <td>10%</td>
      </tr>
      <tr>
        <td>01.01.2017</td>
        <td>Super</td>
      </tr>
      <tr>
        <td>01.01.2017</td>
        <td>Super</td>
      </tr>
      <tr>
        <td>01.01.2017</td>
        <td>--</td>
      </tr>

    </tbody>
  </table>
</div>


<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>



<!-- Table Bewertungsbogen Info Spalte -->

<div class="row">

<div class="col-xs-3 test">      
    <table class="table info_spalte_bewertungsbogen">
     <thead>
        <tr>
            <th>Name</th>                    
        </tr>
     </thead>

    <tbody>
      <tr class="btn-info">
        <td>Hans Wurst</td>             
      </tr>  
      <tr class="btn-info">
        <td>Hans Wurst</td>             
      </tr>  
      <tr class="btn-info">
        <td>Hans Wurst</td>             
     </tr> 
     <tr class="btn-info">
        <td>Hans Wurst</td>             
    </tr>  
    <tr class="btn-info">
        <td>Hans Wurst</td>             
    </tr> 
    <tr class="btn-info">
        <td>Hans Wurst</td>             
    </tr> 
    <tr class="btn-info">
        <td>Hans Wurst</td>             
    </tr> 

    </tbody>
  </table>
</div>







<!-- Table Bewertungsbogen -->
  


<div class="col-xs-9 bewertungsbogen">      
    <table class="table">
     <thead>
        <tr>
            <th>01.01.2017</th>
            <th>07.01.2017</th>    
            <th>14.01.2017</th>      
            <th>21.01.2017</th> 
            <th>28.01.2017</th>    
            <th>02.02.2017</th>         
        </tr>
     </thead>

    <tbody>
      <tr>

        <td>
            <form>
                <div class="input-group col-xs-10">
                  <input type="text" class="form-control" placeholder="">
                    <div class="input-group-btn">
                        <button class="btn btn-default" type="edit">
                            <i class="fa fa-pencil"></i>
                        </button>
                    </div>
                </div>
            </form>
        </td>

        <td>
            <form>
                <div class="input-group col-xs-10">
                    <input type="text" class="form-control" placeholder="">
                     <div class="input-group-btn">
                        <button class="btn btn-default" type="edit">
                            <i class="fa fa-pencil"></i>
                        </button>
                    </div>
                </div>
            </form>
        </td>   

        <td>
            <form>
                <div class="input-group col-xs-10">
                    <input type="text" class="form-control" placeholder="">
                     <div class="input-group-btn">
                        <button class="btn btn-default" type="edit">
                            <i class="fa fa-pencil"></i>
                        </button>
                    </div>
                </div>
            </form>
        </td> 

        <td>
            <form>
                <div class="input-group col-xs-10">
                    <input type="text" class="form-control" placeholder="">
                     <div class="input-group-btn">
                        <button class="btn btn-default" type="edit">
                            <i class="fa fa-pencil"></i>
                        </button>
                    </div>
                </div>
            </form>
        </td> 

        <td>
            <form>
                <div class="input-group col-xs-10">
                    <input type="text" class="form-control" placeholder="">
                     <div class="input-group-btn">
                        <button class="btn btn-default" type="edit">
                            <i class="fa fa-pencil"></i>
                        </button>
                    </div>
                </div>
            </form>
        </td> 

        <td>
            <form>
                <div class="input-group col-xs-10">
                    <input type="text" class="form-control" placeholder="">
                     <div class="input-group-btn">
                        <button class="btn btn-default" type="edit">
                            <i class="fa fa-pencil"></i>
                        </button>
                    </div>
                </div>
            </form>
        </td> 

      </tr>
      <tr>

        <td>
            <form>
             <div class="input-group col-xs-10">
                    <input type="text" class="form-control" placeholder="">
                    <div class="input-group-btn">
                        <button class="btn btn-default" type="edit">
                            <i class="fa fa-pencil"></i>
                        </button>
                    </div>
                </div>
            </form>
        </td>

  <td>
      <form>
          <div class="input-group col-xs-10">
              <input type="text" class="form-control" placeholder="">
               <div class="input-group-btn">
                  <button class="btn btn-default" type="edit">
                      <i class="fa fa-pencil"></i>
                  </button>
              </div>
          </div>
      </form>
  </td>   

  <td>
      <form>
          <div class="input-group col-xs-10">
              <input type="text" class="form-control" placeholder="">
               <div class="input-group-btn">
                  <button class="btn btn-default" type="edit">
                      <i class="fa fa-pencil"></i>
                  </button>
              </div>
          </div>
      </form>
  </td> 

  <td>
      <form>
          <div class="input-group col-xs-10">
              <input type="text" class="form-control" placeholder="">
               <div class="input-group-btn">
                  <button class="btn btn-default" type="edit">
                      <i class="fa fa-pencil"></i>
                  </button>
              </div>
          </div>
      </form>
  </td> 

  <td>
      <form>
          <div class="input-group col-xs-10">
              <input type="text" class="form-control" placeholder="">
               <div class="input-group-btn">
                  <button class="btn btn-default" type="edit">
                      <i class="fa fa-pencil"></i>
                  </button>
              </div>
          </div>
      </form>
  </td> 

  <td>
      <form>
          <div class="input-group col-xs-10">
              <input type="text" class="form-control" placeholder="">
               <div class="input-group-btn">
                  <button class="btn btn-default" type="edit">
                      <i class="fa fa-pencil"></i>
                  </button>
              </div>
          </div>
      </form>
  </td> 

      </tr>
      <tr>
      <td>
      <form>
          <div class="input-group col-xs-10">
            <input type="text" class="form-control" placeholder="">
              <div class="input-group-btn">
                  <button class="btn btn-default" type="edit">
                      <i class="fa fa-pencil"></i>
                  </button>
              </div>
          </div>
      </form>
  </td>

  <td>
      <form>
          <div class="input-group col-xs-10">
              <input type="text" class="form-control" placeholder="">
               <div class="input-group-btn">
                  <button class="btn btn-default" type="edit">
                      <i class="fa fa-pencil"></i>
                  </button>
              </div>
          </div>
      </form>
  </td>   

  <td>
      <form>
          <div class="input-group col-xs-10">
              <input type="text" class="form-control" placeholder="">
               <div class="input-group-btn">
                  <button class="btn btn-default" type="edit">
                      <i class="fa fa-pencil"></i>
                  </button>
              </div>
          </div>
      </form>
  </td> 

  <td>
      <form>
          <div class="input-group col-xs-10">
              <input type="text" class="form-control" placeholder="">
               <div class="input-group-btn">
                  <button class="btn btn-default" type="edit">
                      <i class="fa fa-pencil"></i>
                  </button>
              </div>
          </div>
      </form>
  </td> 

  <td>
      <form>
          <div class="input-group col-xs-10">
              <input type="text" class="form-control" placeholder="">
               <div class="input-group-btn">
                  <button class="btn btn-default" type="edit">
                      <i class="fa fa-pencil"></i>
                  </button>
              </div>
          </div>
      </form>
  </td> 

  <td>
      <form>
          <div class="input-group col-xs-10">
              <input type="text" class="form-control" placeholder="">
               <div class="input-group-btn">
                  <button class="btn btn-default" type="edit">
                      <i class="fa fa-pencil"></i>
                  </button>
              </div>
          </div>
      </form>
  </td> 

      </tr>
      <tr>
        <td>
            <form>
                <div class="input-group col-xs-10">
                  <input type="text" class="form-control" placeholder="">
                    <div class="input-group-btn">
                        <button class="btn btn-default" type="edit">
                            <i class="fa fa-pencil"></i>
                        </button>
                    </div>
                </div>
            </form>
        </td>

        <td>
            <form>
                <div class="input-group col-xs-10">
                    <input type="text" class="form-control" placeholder="">
                     <div class="input-group-btn">
                        <button class="btn btn-default" type="edit">
                            <i class="fa fa-pencil"></i>
                        </button>
                    </div>
                </div>
            </form>
        </td>   

        <td>
            <form>
                <div class="input-group col-xs-10">
                    <input type="text" class="form-control" placeholder="">
                     <div class="input-group-btn">
                        <button class="btn btn-default" type="edit">
                            <i class="fa fa-pencil"></i>
                        </button>
                    </div>
                </div>
            </form>
        </td> 

        <td>
            <form>
                <div class="input-group col-xs-10">
                    <input type="text" class="form-control" placeholder="">
                     <div class="input-group-btn">
                        <button class="btn btn-default" type="edit">
                            <i class="fa fa-pencil"></i>
                        </button>
                    </div>
                </div>
            </form>
        </td> 

        <td>
            <form>
                <div class="input-group col-xs-10">
                    <input type="text" class="form-control" placeholder="">
                     <div class="input-group-btn">
                        <button class="btn btn-default" type="edit">
                            <i class="fa fa-pencil"></i>
                        </button>
                    </div>
                </div>
            </form>
        </td> 

        <td>
            <form>
                <div class="input-group col-xs-10">
                    <input type="text" class="form-control" placeholder="">
                     <div class="input-group-btn">
                        <button class="btn btn-default" type="edit">
                            <i class="fa fa-pencil"></i>
                        </button>
                    </div>
                </div>
            </form>
        </td> 
      </tr>
      <tr>
      <td>
      <form>
          <div class="input-group col-xs-10">
            <input type="text" class="form-control" placeholder="">
              <div class="input-group-btn">
                  <button class="btn btn-default" type="edit">
                      <i class="fa fa-pencil"></i>
                  </button>
              </div>
          </div>
      </form>
  </td>

  <td>
      <form>
          <div class="input-group col-xs-10">
              <input type="text" class="form-control" placeholder="">
               <div class="input-group-btn">
                  <button class="btn btn-default" type="edit">
                      <i class="fa fa-pencil"></i>
                  </button>
              </div>
          </div>
      </form>
  </td>   

  <td>
      <form>
          <div class="input-group col-xs-10">
              <input type="text" class="form-control" placeholder="">
               <div class="input-group-btn">
                  <button class="btn btn-default" type="edit">
                      <i class="fa fa-pencil"></i>
                  </button>
              </div>
          </div>
      </form>
  </td> 

  <td>
      <form>
          <div class="input-group col-xs-10">
              <input type="text" class="form-control" placeholder="">
               <div class="input-group-btn">
                  <button class="btn btn-default" type="edit">
                      <i class="fa fa-pencil"></i>
                  </button>
              </div>
          </div>
      </form>
  </td> 

  <td>
      <form>
          <div class="input-group col-xs-10">
              <input type="text" class="form-control" placeholder="">
               <div class="input-group-btn">
                  <button class="btn btn-default" type="edit">
                      <i class="fa fa-pencil"></i>
                  </button>
              </div>
          </div>
      </form>
  </td> 

  <td>
      <form>
          <div class="input-group col-xs-10">
              <input type="text" class="form-control" placeholder="">
               <div class="input-group-btn">
                  <button class="btn btn-default" type="edit">
                      <i class="fa fa-pencil"></i>
                  </button>
              </div>
          </div>
      </form>
  </td> 
      </tr>
      <tr>
      <td>
      <form>
          <div class="input-group col-xs-10">
            <input type="text" class="form-control" placeholder="">
              <div class="input-group-btn">
                  <button class="btn btn-default" type="edit">
                      <i class="fa fa-pencil"></i>
                  </button>
              </div>
          </div>
      </form>
  </td>

  <td>
      <form>
          <div class="input-group col-xs-10">
              <input type="text" class="form-control" placeholder="">
               <div class="input-group-btn">
                  <button class="btn btn-default" type="edit">
                      <i class="fa fa-pencil"></i>
                  </button>
              </div>
          </div>
      </form>
  </td>   

  <td>
      <form>
          <div class="input-group col-xs-10">
              <input type="text" class="form-control" placeholder="">
               <div class="input-group-btn">
                  <button class="btn btn-default" type="edit">
                      <i class="fa fa-pencil"></i>
                  </button>
              </div>
          </div>
      </form>
  </td> 

  <td>
      <form>
          <div class="input-group col-xs-10">
              <input type="text" class="form-control" placeholder="">
               <div class="input-group-btn">
                  <button class="btn btn-default" type="edit">
                      <i class="fa fa-pencil"></i>
                  </button>
              </div>
          </div>
      </form>
  </td> 

  <td>
      <form>
          <div class="input-group col-xs-10">
              <input type="text" class="form-control" placeholder="">
               <div class="input-group-btn">
                  <button class="btn btn-default" type="edit">
                      <i class="fa fa-pencil"></i>
                  </button>
              </div>
          </div>
      </form>
  </td> 

  <td>
      <form>
          <div class="input-group col-xs-10">
              <input type="text" class="form-control" placeholder="">
               <div class="input-group-btn">
                  <button class="btn btn-default" type="edit">
                      <i class="fa fa-pencil"></i>
                  </button>
              </div>
          </div>
      </form>
  </td> 
      </tr>
      <tr>
      <td>
      <form>
          <div class="input-group col-xs-10">
            <input type="text" class="form-control" placeholder="">
              <div class="input-group-btn">
                  <button class="btn btn-default" type="edit">
                      <i class="fa fa-pencil"></i>
                  </button>
              </div>
          </div>
      </form>
  </td>

  <td>
      <form>
          <div class="input-group col-xs-10">
              <input type="text" class="form-control" placeholder="">
               <div class="input-group-btn">
                  <button class="btn btn-default" type="edit">
                      <i class="fa fa-pencil"></i>
                  </button>
              </div>
          </div>
      </form>
  </td>   

  <td>
      <form>
          <div class="input-group col-xs-10">
              <input type="text" class="form-control" placeholder="">
               <div class="input-group-btn">
                  <button class="btn btn-default" type="edit">
                      <i class="fa fa-pencil"></i>
                  </button>
              </div>
          </div>
      </form>
  </td> 

  <td>
      <form>
          <div class="input-group col-xs-10">
              <input type="text" class="form-control" placeholder="">
               <div class="input-group-btn">
                  <button class="btn btn-default" type="edit">
                      <i class="fa fa-pencil"></i>
                  </button>
              </div>
          </div>
      </form>
  </td> 

  <td>
      <form>
          <div class="input-group col-xs-10">
              <input type="text" class="form-control" placeholder="">
               <div class="input-group-btn">
                  <button class="btn btn-default" type="edit">
                      <i class="fa fa-pencil"></i>
                  </button>
              </div>
          </div>
      </form>
  </td> 

  <td>
      <form>
          <div class="input-group col-xs-10">
              <input type="text" class="form-control" placeholder="">
               <div class="input-group-btn">
                  <button class="btn btn-default" type="edit">
                      <i class="fa fa-pencil"></i>
                  </button>
              </div>
          </div>
      </form>
  </td> 


      </tr>

    </tbody>
  </table>
</div>

</div><!-- ./row -->


















</div>

<?php include ("../../../../footer.phtml"); ?>