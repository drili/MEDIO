<?php
      include("includes/includedFiles.php");

      if (isset($_GET['id'])) {
            $artistId = $_GET['id'];
      } else {
            header("Location: index.php");
      }

      $artist = new Artist($con, $artistId);
?>

<?php
      $imageBgQuery = mysqli_query($con, "SELECT artworkPath FROM albums WHERE artist = '$artistId'");
      while ($row = mysqli_fetch_array($imageBgQuery)) {
            $imageBgArtist = $row['artworkPath'];
            // echo $imageBgArtist;
      }
?>
<div class="entityInfo borderBottom">
      <div class="centerSection" style='background-image: url("<?php echo $imageBgArtist; ?>");'>
            <div class="artistInfo">
                  <h1 class="artistName"><?php echo $artist->getName(); ?></h1>
                  <div class="headerButtons">
                        <button class="button green" type="button" name="button" onclick="playFirstSong()">Play</button>
                  </div>
            </div>
      </div>
</div>

<div class="trackListContainer borderBottom">
      <h2>POPULAR SONGS</h2>
      <ul class="trackList">
            <li class='trackListRow trackListRowTop'>
                  <div class='trackCount'>
                        <span class='trackNumber'></span>
                  </div>

                  <div class='trackInfo'>
                        <span class='trackName'></span>
                        <span class='artistName'></span>
                  </div>

                  <div class='trackOptions'>
                        <span>Options</span>
                        <!-- <img class='optionsButton' src='assets/images/icons/more.png'> -->
                  </div>

                  <div class='trackDuration'>
                        <span class='duration'>Duration</span>
                  </div>

                  <div class='trackPlays'>
                        <span class='plays'>Plays</span>
                  </div>
            </li>
            <?php
                  $songIdArray = $artist->getSongIds();
                  $i = 1;
                  foreach ($songIdArray as $songId) {
                        if ($i > 5) {
                              break;
                        }
                        $albumSong = new Song($con, $songId);
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

<div class="gridViewArtist">
      <h2>ALBUMS</h2>
      <div class="gridViewContainer">
            <?php
                  $albumQuery = mysqli_query($con, "SELECT * FROM albums WHERE artist = '$artistId'");
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
