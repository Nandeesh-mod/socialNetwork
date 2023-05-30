<style>
    <?php
    include 'css/category.css';
    ?>
</style>
<body>
    <div class="category-outer">
        <!-- routing details here -->
        <form action="#">
           <select id="category" name="category">
            <option class="option-cat" value="ISE">ISE</option>
            <option class="option-cat" value="AI&DS">AI&DS</option>
            <option class="option-cat" value="CSE">CSE</option>
            <option class="option-cat" value="MECH">MECH</option>
            <option class="option-cat" value="CIVIL">CIVIL</option>
            <option class="option-cat" value="CHEMICAL">CHEMICAL</option>
            <option class="option-cat" value="BT">BT</option>
            <option class="option-cat" value="PHYSICS">PHYSICS</option>
            <option class="option-cat" value="MATHS">MATHS</option>
            <option class="option-cat" value="E&C">E&C</option>
            <option class="option-cat" value="EEE">E&E</option>
           </select>
           <input class="cat-submit" type="submit" value="search" name="cat_submit">
        </form>
    </div>
</body>
</html>

<script src="javascript/index.js"></script>