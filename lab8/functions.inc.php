<?php

    function outputOrderRow($file, $title, $quantity, $price) {
        $amount=$quantity*$price;
        echo "<tr>";
        //TODO
        echo"<td><img src=\"images/books/tinysquare/$file\"></td>
                      <td class=\"mdl-data-table__cell--non-numeric\">$title</td>
                      <td>$quantity</td>
                      <td>$$price</td>
                      <td>$$amount</td>";
        echo "</tr>";

    }
?>