<section class="hero is-medium" style="background: rgb(255,255,255);
background: linear-gradient(180deg, rgba(255,255,255,1) 0%, rgba(223,233,243,1) 100%);">
    <div class="hero-body">
        <div class="container ">
            <div class="column is-6 is-hidden-touch" style="z-index: 1; position: absolute;">
                <p class="title"><span style="font-size: 3.5rem"><?php echo $lang['herotitle']; ?></span></p>
                <hr class="primary">
                <p class="subtitle is-4"><i>"Think globally, act locally"</i></p>
                <p class="subtitle is-5 mx-6 has-text-right"><strong>David Brower</strong></p>
            </div>

            <div class="column is-12 is-offset-4 is-hidden-touch">
                <figure class="image">
                    <img alt="home-page-banner-3d-figure" src="images/banner.png" style="margin-top: -140px;">
                </figure>
            </div>

            <div class="column has-text-centered is-hidden-desktop">
                <p class="title">Create modern, practical one-page site for just about anything.</p>
                <p class="subtitle is-5"><i>"Think global, act local"</i></p>
                <figure class="image">
                    <img alt="home-page-banner-3d-figure" src="images/banner.png">
                </figure>
            </div>

        </div>
        <table class="table">
        <thead>
    <tr>
      <th><?php echo $lang['event']; ?></th>
      <th><?php echo $lang['type']; ?></th>
      <th><?php echo $lang['city']; ?></th>
      <th><?php echo $lang['address']; ?></th>
    </tr>
  </thead>
        <tbody>
        <?php
    $sql = "SELECT * FROM events";
    $data = mysqli_query($link,$sql);

        while($row = mysqli_fetch_array($data)){ 
    echo '<tr>';
    echo '<td>' . $row['Event'] . '</td>';
    echo '<td>' . $row['Type'] . '</td>';
    echo '<td>' . $row['City'] . '</td>';
    echo '<td>' . $row['Address'] . '</td>';
    echo '</tr>';
  }
  ?>
        </tbody>
        </table>
        
    </div>
</section>