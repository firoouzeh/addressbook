<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Person Details</h3>
  </div>
  <div class="panel-body">
    <div class="col-xs-6">
      <?php if($viewModel['firstName']) : ?>
      <div class="panel panel-info">
        <div class="panel-heading">First Name</div>
        <div class="panel-body">
          <?php echo $viewModel['firstName'] ?>
        </div>
      </div>
      <?php endif; ?>
    </div>
    <div class="col-xs-6">
      <?php if($viewModel['lastName']) : ?>
      <div class="panel panel-info">
        <div class="panel-heading">Last Name</div>
        <div class="panel-body">
          <?php echo $viewModel['lastName'] ?>
        </div>
      </div>
      <?php endif; ?>
    </div>
    <div class="col-xs-12">
      <?php if($viewModel['emails']) : ?>
      <div class="panel panel-info">
        <div class="panel-heading">Email</div>
        <div class="panel-body">
          <?php
            foreach($viewModel['emails'] as $index=>$email){
              echo ($index+1).") ".$email."<br />";
            } ?>
        </div>
      </div>
      <?php endif; ?>

      <?php if($viewModel['numbers']) : ?>
      <div class="panel panel-info">
        <div class="panel-heading">Number</div>
        <div class="panel-body">
          <?php
            foreach($viewModel['numbers'] as $index=>$number){
              echo ($index+1).") ".$number."<br />";
            } ?>
        </div>
      </div>
      <?php endif; ?>

      <?php if($viewModel['addresses']) : ?>
      <div class="panel panel-info">
        <div class="panel-heading">Address</div>
        <div class="panel-body">
          <?php
            foreach($viewModel['addresses'] as $index=>$address){
              echo ($index+1).") ".$address."<br />";
            } ?>
        </div>
      </div>
      <?php endif; ?>

      <?php if($viewModel['groups']) : ?>
      <div class="panel panel-info">
        <div class="panel-heading">Group</div>
        <div class="panel-body">
          <?php
            foreach($viewModel['groups'] as $index=>$group){
              echo ($index+1).") ".$group."<br />";
            } ?>
        </div>
      </div>
      <?php endif; ?>
    </div>
  </div>
</div>