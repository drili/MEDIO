<?php include("includes/includedFiles.php"); ?>
<?php
      if (isset($_GET['id'])) {
            $albumId = $_GET['id'];
      } else {
            header("Location: index.php");
      }

      $album = new Album ($con, $albumId);
      $artist = $album->getArtist();
?>
      <!---| Main Content --->
            <div class="entityInfo">
                  <div class="leftSection">
                        <img src="<?php echo $album->getArtworkPath(); ?>" alt="">
                  </div>

                  <div class="rightSection">
                        <h2><?php echo $album->getTitle(); ?></h2>
                        <p>By <?php echo $artist->getName(); ?></p>
                        <p><?php echo $album->getNumberOfSongs(); ?> songs</p>
                  </div>
            </div>

            <div class="trackListContainer">
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

                        </li>
                        <?php
                              $songIdArray = $album->getSongIds();
                              $i = 1;
                              foreach ($songIdArray as $songId) {
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
      <!--- Main Content End|--->
