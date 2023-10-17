<div>
    <?php foreach ($comments as $comment) { ?>
        <div class="flex gap-3">
            <img src="../../images/avatar.png" class="object-cover w-[50px] h-[50px] rounded-full" />
            <div>
                <p class="font-bold mb-1"><?php echo $comment['full_name'] ?></p>
                <p class=""><?php echo $comment['content'] ?></p>
            </div>
        </div>
    <?php } ?>
</div>