

<div class="container">
    <div class="hometext">
        <table class="table">
            <thead>
                <tr>
                    <th>Company</th>
                    <th>Funding Raised</th>
                    <th>Facebook Likes</th>
                </tr>
            </thead>
            
            <tbody style = "text-align:center"> 
                <?php foreach($trackers as $tracker): ?>
                    <tr>
                        <td><?= $tracker["name"] ?></td>
                        <td><?= "$".$tracker["funding"] ?></td>
                        <td><?= $tracker["facebook"] ?></td>
                    </tr>
                <?php endforeach ?>
                
            </tbody>
        </table>
    </div>
</div>