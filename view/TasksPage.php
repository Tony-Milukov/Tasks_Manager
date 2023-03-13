<div>

    
    <form class="taskValueInputForm" method="post" action="#">
        <input placeholder="what have you to do?" name="taskValue" type="text">
        <input class="TaskValueSubmit" value="add task" type="submit">
    </form>
    <div class="tasks">
    <?php if(!empty($tasks)):?>
        <?php foreach ($tasks as $task): ?>
            <div class="taskContainer">
                <div id="<?= $task["id"] ?>" class="task">
                   
                    <form class="markAsDoneForm" method="post">
                        <p class="<?= $task["markedAsDone"] ? "markedAsDone" : ""?>"><?= $task["taskValue"] ?></p>
                        <input  class="markAsDoneBTN"  name="markAsDone" value="<?= $task["markedAsDone"] ? "mark as undone" : "mark as done"?>" type="submit">
                        <input type="text" class="hidden" name="markAsDone" value="<?= $task["id"]?>" >
                    </form>

                </div>
                <form  class="addNewCommentForm" method="post">
                    <input name="newComment" placeholder="write to add a comment" type="text">
                    <input name="addCommentId" type="text" class="hidden" value="<?= $task["id"] ?>" >
                    <input value="add comment" type="submit">
                </form>
                <div class="comments__">
                    <button onclick="toggleСomments(<?= $task["id"] ?>)">comments
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                            <path d="M169.4 470.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L224 370.8 224 64c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 306.7L54.6 265.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z"/>
                        </svg>
                    </button>
                    <div id="commentsFor<?= $task["id"] ?>" class="taskComments hidden">
                        <?php if (array_filter($tasksComments, fn($comment) => $comment["taskId"] == $task["id"])) : ?>
                            <?php foreach (array_filter($tasksComments, fn($comment) => $comment["taskId"] == $task["id"]) as $comment): ?>
                                <div class="taskComment">
                                    <?= $comment["commentValue"] ?>
                                </div>
                            <?php endforeach ?>
                        <?php else: ?>
                            <div class="taskComment">
                                No comments for this task found
                            </div>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
            <br>
        <?php endforeach ?>
    <?php endif;?>
    </div>
</div>

<script src="../JavaScript/TasksPageCommentsBar.js"></script>
