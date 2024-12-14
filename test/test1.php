<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST"> <!-- https://www.google.com/class=tiger_class -->
        <input name="class" type="text" value="tiger_class">
        
        <div id="modalForm">
            <button type="button" id="<?php echo $row['id']; ?>" class="btn btn-xs btn-danger" onclick="App.confirm(this);">
                <i class="fa fa-trash"></i>
            </button>
        </div>

        <tbody class="text-center">
        <?php if (!empty($data['scores'])): ?>
            <?php foreach ($data['scores'] as $row): ?>
            <tr>
                <th><?php echo $row['id']; ?></th>
                <th><?php echo $row['student_id']; ?></th>
                <th><?php echo $row['subject_id']; ?></th>
                <th><?php echo $row['term_id']; ?></th>
                <th><?php echo $row['score']; ?></th>
                <th>
                    <button type="button" id="<?php echo $row['id']; ?>" class="btn btn-xs btn-info" onclick="App.show(this, 'scores');">
                        <i class="fa fa-edit"></i>
                    </button>
                    
                </th>
            </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr class="text-center">
                <td colspan="6">No users</td>
            </tr>
        <?php endif; ?>
    </tbody>
    </form>
</body>
</html>