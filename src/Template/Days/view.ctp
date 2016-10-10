<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Day'), ['action' => 'edit', $day->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Day'), ['action' => 'delete', $day->id], ['confirm' => __('Are you sure you want to delete # {0}?', $day->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Days'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Day'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Loads'), ['controller' => 'Loads', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Load'), ['controller' => 'Loads', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Nutrition Log'), ['controller' => 'NutritionLog', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Nutrition Log'), ['controller' => 'NutritionLog', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Values Log'), ['controller' => 'ValuesLog', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Values Log'), ['controller' => 'ValuesLog', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="days view large-9 medium-8 columns content">
    <h3><?= h($day->date) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $day->has('user') ? $this->Html->link($day->user->name, ['controller' => 'Users', 'action' => 'view', $day->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($day->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date') ?></th>
            <td><?= h($day->date) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($day->description)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Loads') ?></h4>
        <?php if (!empty($day->loads)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Type Load Id') ?></th>
                <th scope="col"><?= __('Day Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($day->loads as $loads): ?>
            <tr>
                <td><?= h($loads->id) ?></td>
                <td><?= h($loads->type_load_id) ?></td>
                <td><?= h($loads->day_id) ?></td>
                <td><?= h($loads->user_id) ?></td>
                <td><?= h($loads->description) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Loads', 'action' => 'view', $loads->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Loads', 'action' => 'edit', $loads->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Loads', 'action' => 'delete', $loads->id], ['confirm' => __('Are you sure you want to delete # {0}?', $loads->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Nutrition Log') ?></h4>
        <?php if (!empty($day->nutrition_log)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Sport Nutrition Id') ?></th>
                <th scope="col"><?= __('Day Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Time') ?></th>
                <th scope="col"><?= __('Value') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($day->nutrition_log as $nutritionLog): ?>
            <tr>
                <td><?= h($nutritionLog->id) ?></td>
                <td><?= h($nutritionLog->sport_nutrition_id) ?></td>
                <td><?= h($nutritionLog->day_id) ?></td>
                <td><?= h($nutritionLog->user_id) ?></td>
                <td><?= h($nutritionLog->time) ?></td>
                <td><?= h($nutritionLog->value) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'NutritionLog', 'action' => 'view', $nutritionLog->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'NutritionLog', 'action' => 'edit', $nutritionLog->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'NutritionLog', 'action' => 'delete', $nutritionLog->id], ['confirm' => __('Are you sure you want to delete # {0}?', $nutritionLog->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Values Log') ?></h4>
        <?php if (!empty($day->values_log)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Unit Id') ?></th>
                <th scope="col"><?= __('Day Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Time') ?></th>
                <th scope="col"><?= __('Value') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($day->values_log as $valuesLog): ?>
            <tr>
                <td><?= h($valuesLog->id) ?></td>
                <td><?= h($valuesLog->unit_id) ?></td>
                <td><?= h($valuesLog->day_id) ?></td>
                <td><?= h($valuesLog->user_id) ?></td>
                <td><?= h($valuesLog->time) ?></td>
                <td><?= h($valuesLog->value) ?></td>
                <td><?= h($valuesLog->description) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ValuesLog', 'action' => 'view', $valuesLog->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ValuesLog', 'action' => 'edit', $valuesLog->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ValuesLog', 'action' => 'delete', $valuesLog->id], ['confirm' => __('Are you sure you want to delete # {0}?', $valuesLog->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
