<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Group Members</h3>
  </div>
  <div class="panel-body">

    <!-- Table -->
    <table class="table">
      <thead>
        <tr>
          <th>Person ID</th>
          <th>Person Name</th>
        </tr>
      </thead>
      <tbody>

      <?php if(!empty($viewModel)): ?>
      <?php foreach($viewModel as $item): ?>
        <tr>
          <td><?php echo $item['id']; ?></td>
          <td><?php echo $item['name']; ?></td>
        </tr>
      <?php endforeach; ?>
      <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>