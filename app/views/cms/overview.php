<?php
require __DIR__ . '/../components/head.php';
require __DIR__ . '/../components/nav-cms.php';
?>

<?php
$event = $_GET['event'];
?>

<section class="overview-container-info">

    <h1 class="overview-header"><?php echo ucfirst($event) ?> Event</h1>
    <div class="overview-info">
        
    <div class="form-item">
            <label for="">Event name:</label>
            
            <!-- <input type="text" name="" value="<?php echo ucfirst($model->Name) ?> event"> -->
            <input type="text" name="" value="Jazz event">
            
            <img src="/icons/cms-edit-form.png" alt="edit button">
        </div>
        
        <div class="form-item-dropdwn">
            <label for="genres">Genre</label>
            <select name="genres" id="genres">
                <option value="Swing and calm">Swing and calm</option>
                <option value="Rave and hard">Rave and hard</option>
                <option value="Food">Food</option>
            </select>
        </div>
        
        <div class="form-item">
            <label for="">Description:</label>
            
            <!-- <textarea name="" rows="6"><?php echo $model->Description ?></textarea> -->
            <textarea name="" rows="6"></textarea>

        </div>
        
        <div class="form-item lower-form-img">
            <label for="">Date:</label>
            
            <!-- <input type="text" name="" value="<?php echo $model->StartDate ?>">
            <input type="text" name="" value="<?php echo $model->EndDate ?>"> -->

            <input type="text" name="" value="2022-07-27">
            <input type="text" name="" value="2022-07-31">

            <img src="/icons/cms-edit-form.png" alt="edit button">
        </div>
        
        <div class="form-item lower-form-img">
            <label for="">Location(s):</label>
            <p><strong>Patronaat:</strong> Main hall, Second Hall, Third Hall</p>
            <p><strong>Grote markt:</strong> N.v.t.</p>
            <img src="/icons/cms-edit-form.png" alt="edit button">
        </div>
    </div>

    <div class="overview-image">
    </div>
</section>

<section class="overview-container-table">

    <div class="overview-btn-container">

        <ul class="overview-btns-left">
            <li><a class="btns-left-active" href="#">Thursday</a></li>
            <li><a href="">Friday</a></li>
            <li><a href="">Saturday</a></li>
            <li><a href="">Sunday</a></li>
        </ul>

        <ul class="overview-btns-right">
            <li>
                <a href="">
                    Add item
                    <img src="/icons/add-item.png" alt="add item">
                </a>
            </li>
            <li>
                <a href="">
                    Delete items
                    <img src="/icons/delete-item.png" alt="delete item">
                </a>
            </li>
        </ul>

    </div>
    <div class="table-wrapper">
        <table>
            <tr>
                <th></th>
                <th>Activity name</th>
                <th>Time</th>
                <th>Location</th>
                <th>Hall</th>
                <th>Price</th>
                <th>Edit</th>
            </tr>
            <tr>
                <td><input type="checkbox" name="" id=""></td>
                <td>Gumbo Kings</td>
                <td>18:00 - 19:00</td>
                <td>Patronaat</td>
                <td>Main Hall</td>
                <td>15.00 ,-</td>
                <td><a href=""><img src="/icons/cms-table-edit.png" alt=""></a></td>
            </tr>
            <tr>
                <td><input type="checkbox" name="" id=""></td>
                <td>Evolve</td>
                <td>19:30 - 20:30</td>
                <td>Patronaat</td>
                <td>Main Hall</td>
                <td>15.00 ,-</td>
                <td><a href=""><img src="/icons/cms-table-edit.png" alt=""></a></td>
            </tr>
            <tr>
                <td><input type="checkbox" name="" id=""></td>
                <td>Njtam Rosie</td>
                <td>21:00 - 22:00</td>
                <td>Patronaat</td>
                <td>Main Hall</td>
                <td>15.00 ,-</td>
                <td><a href=""><img src="/icons/cms-table-edit.png" alt=""></a></td>
            </tr>
        </table>
        </div>
</section>
</main> <!-- close main tag from cms nav -->
</div> <!-- close div of whole container from cms nav -->