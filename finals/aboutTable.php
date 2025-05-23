<div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Content</th>

                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                             <th>ID</th>
                                            <th>Title</th>
                                            <th>Content</th>
                            
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                            try {
                                                $sqlabout="SELECT * FROM about";
                                                $stmtabout=$con->prepare($sqlabout);
                                                $stmtabout->execute();
                                                $strtable="";
                                                while($row= $stmtabout->fetch()){
                                                    $strtable.="<tr>";
                                                    $strtable.="<td>{$row[0]}<td>";
                                                    $strtable.="<td>{$row[1]}<td>";
                                                    $content=substr(nl2br($row[2]), 0, 200);
                                                    $strtable.="<td>{$content}...<td>";
                                                    $strtable.="<td>Buttons dito<td>";
                                                    $strtable.="</td>";
                                                }
                                                echo $strtable;
                                            } catch (PDOException $th) {
                                                echo $th->getmessage();
                                            }
                                        ?>
                                        
                                    </tbody>
                                </table>
                            </div>