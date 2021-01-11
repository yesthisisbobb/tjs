<?php
include("../../config.php");
                    $sql = "SELECT * FROM master_tipe where status= 'Active' ORDER BY id";
                    $query = mysqli_query($conn, $sql);
                    while ($amku = mysqli_fetch_array($query)) {
                      echo  '<tr class="odd gradeX">


                        <td><img src="../gambar/'.$amku["kode"] . ".jpg".'" widtn="50" height="50"></td>
                        <td> '.$amku["kode"].'</td>
                        <td> '.$amku["nama"].'</td>
                        <td> '.$amku["import"].'</td>
                        <td> '.$amku["panjang"].'</td>
                        <td> '.$amku["lebar"].'</td>
                        <td> '.$amku["surface"].'</td>
                        <td> '.$amku["color"].'</td>
                        <td> '.$amku["pattern"].'</td>


                        <td class="with-btn" nowrap="">

                          <a href="master_tipe.php?aksi=view&no='.$amku["id"].'" class="btn btn-primary btn-rounded btn-sm" role="button">Edit</a>
                          <!-- <a href="#" class="btn btn-primary" role="button"><i class="fa fa-pencil-alt"></i></a> -->

                          <a href="proses-tipe.php?aksi=update&no='.$amku["id"].'" class="btn btn-primary btn-rounded btn-sm" role="button">Disable</a>
                          <a href="proses-tipe.php?aksi=active&no='.$amku["id"].'" class="btn btn-primary btn-rounded btn-sm" role="button">Enable</a>
                          <a href="proses-tipe.php?aksi=delete&no='.$amku["id"].'" class="btn btn-primary btn-rounded btn-sm" role="button">Delete</a>

                        </td>';
                   } ?>