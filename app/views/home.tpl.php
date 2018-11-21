<?php foreach ($viewVars['characters'] as $characters) :?>
    <table>
        <td>
        <div>
            <img src="<?php echo $viewVars['baseURL'] . '/' . 'assets/img' .'/'. $characters->getPicture(); ?>"/>

            <h3><?php echo $characters->getName(); ?></h3>

            <p><?php echo $characters->getDescription(); ?></p>
            
            <p><?php echo $characters->getTypeName(); ?></p> 
        </div>
        </td>
    </table>
<?php endforeach; ?>


