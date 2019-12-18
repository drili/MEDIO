<?php
      include("includes/includedFiles.php");

      if (isset($_GET['term'])) {
            $term = urldecode($_GET['term']);
            // echo $term;
      } else {
            $term = "";
      }
?>

<div class="searchContainer">
      <!-- <h4>Search for an artist, album or song</h4> -->
      <!-- <input type="text" name="" value="<?php echo $term; ?>" class="searchInput" placeholder="Search..." onfocus="this.selectionStart = this.selectionEnd = this.value.length;"> -->
      <h2>Searches found for '<?php echo $term; ?>'</h2>
</div>

<!-- <script type="text/javascript">
      $(".searchInput").focus();

      $(function() {
            $(".searchInput").keyup(function() {
                  clearTimeout(timer);
                  timer = setTimeout(function() {
                        var val = $(".searchInput").val();
                        openPage("search.php?term=" + val);
                  }, 1200);
            });
      });
</script> -->

<?php
      if ($term == "") {
            exit();
      }
?>

<div class="trackListContainer borderBottom">
      <h2>POPULAR SONGS</h2>
      <ul class="trackList">
            <?php
                  $songsQuery = mysqli_query($con, "SELECT id FROM songs WHERE title LIKE '$term%'");

                  if (mysqli_num_rows($songsQuery) == 0) {
                        echo "<span class='noResults'>No songs founds matching '" . $term . "'</span>";
                  }

                  $songIdArray = array();
                  $i = 1;
                  while ($row = mysqli_fetch_array($songsQuery)) {
                        // if ($i > 15) {
                        //       break;
                        // }

                        array_push($songIdArray, $row['id']);

                        $albumSong = new Song($con, $row['id']);
                        $albumArtist = $albumSong->getArtist();

                        echo "<li class='trackListRow'>
                                    <div class='trackCount'>
                                          <img class='play' src='assets/images/icons/play-white.png' onclick='setTrack(\"" . $albumSong->getId() . "\", tempPlaylist, true)'>
                                          <span class='trackNumber'>$i</span>
                                    </div>

                                    <div class='trackInfo'>
                                          <span class='trackName'>" . $albumSong->getTitle() . "</span>
                                          <span class='artistName'>" . $albumArtist->getName() . "</span>
                                    </div>

                                    <div class='trackOptions'>
                                          <input type='hidden' class='songId' value='" . $albumSong->getId() . "'>
                                          <img class='optionsButton' src='assets/images/icons/more.png' onclick='showOptionsMenu(this)'>
                                    </div>

                                    <div class='trackDuration'>
                                          <span class='duration'>" . $albumSong->getDuration() . "</span>
                                    </div>

                                    <div class='trackPlays'>
                                          <span class='plays'>" . $albumSong->getPlays() . "</span>
                                    </div>
                              </li>";

                        $i++;
                  }
            ?>

            <script type="text/javascript">
                  var tempSongIds = '<?php echo json_encode($songIdArray); ?>';
                  tempPlaylist = JSON.parse(tempSongIds);
                  console.log(tempPlaylist);
            </script>
      </ul>
</div>

<div class="artistsContainer borderBottom">
      <h2>ARTISTS</h2>
      <?php
            $artistsQuery = mysqli_query($con, "SELECT id FROM artists WHERE name LIKE '$term%'");

            if (mysqli_num_rows($artistsQuery) == 0) {
                  echo "<span class='noResults'>No artists founds matching '" . $term . "'</span>";
            }

            while ($row = mysqli_fetch_array($artistsQuery)) {
                  $artistFound = new Artist($con, $row['id']);

                  echo "<div class='searchResultRow'>
                              <div class='artistName'>
                                    <span role='link' tabindex='0' onclick='openPage(\"artist.php?id=" . $artistFound->getId() . "\")'>
                                    "
                                          . $artistFound->getName() .
                                    "
                                    </span>
                              </div>
                        </div>";
            }
      ?>
</div>

<div class="gridViewArtist">
      <h2>ALBUMS</h2>
      <div class="gridViewContainer">
            <?php
                  $albumQuery = mysqli_query($con, "SELECT * FROM albums WHERE title LIKE '$term%'");



                  while ($row = mysqli_fetch_array($albumQuery)) {
                        echo "<div class='gridViewItem'>
                                    <span role='link' tabindex='0' onclick='openPage(\"album.php?id=" . $row['id'] . "\")'>
                                          <div class='gridViewItemBox'>
                                                <img src='" . $row['artworkPath'] . "'>
                                          </div>
                                          <div class='gridViewInfo'>" . $row['title'] . "</div>
                                    </span>
                              </div>";
                  }
            ?>
      </div>
      <?php
      if (mysqli_num_rows($albumQuery) == 0) {
            echo "<span class='noResults'>No artists founds matching '" . $term . "'</span>";
      }
      ?>
</div>

<nav class="optionsMenu">
      <input type="hidden" class="songId" name="" value="">
      <?php
            echo Playlist::getPlaylistsDropdown($con, $userLoggedIn->getUsername());
      ?>
      <div class="item">
            Option 2
      </div>
      <div class="item">
            Option 3
      </div>
</nav>
