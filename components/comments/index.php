<?php
if ($blog_id) {
    $sql = "Select * from `comment` where `blog_id` = $blog_id";
    $result = mysqli_query($conn, $sql);
    $tong_bg = mysqli_num_rows($result);
    $stt = 0;
    $comments  = [];
    while ($row = mysqli_fetch_object($result)) {
        $comment = [];
        $stt++;
        $comment['content'] = $row->content;
        $comment['phone_number'] = $row->phone_number;
        $comment['full_name'] = $row->full_name;
        $comments[] = $comment;
    }
}
?>
<div class="py-4">
    <div class="border-b-[2px] border-[#EEE]">
        <div class="border-b-[4px] inline-block border-[#02c4c1]">
            Bình luận (<?php count($comments) ?>)
        </div>
    </div>
    <div class="max-h-[300px] overflow-y-scroll" >
        <?php include("List.php") ?>
    </div>
    <?php include("Form.php") ?>
</div>