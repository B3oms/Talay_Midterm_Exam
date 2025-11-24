<?php $__env->startSection('content'); ?>
<!-- Tweet Form -->
<div class="bg-white dark:bg-gray-800 rounded-xl shadow p-4">
    <form action="<?php echo e(route('tweet.store')); ?>" method="POST" class="space-y-2">
        <?php echo csrf_field(); ?>
        <textarea name="content" placeholder="What's happening?" maxlength="280" required
                  class="w-full border border-gray-300 dark:border-gray-700 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 dark:bg-gray-900 dark:text-white"><?php echo e(old('content')); ?></textarea>
        <div class="flex justify-between items-center">
            <span class="text-sm text-gray-500 dark:text-gray-400"><?php echo e(strlen(old('content') ?? '')); ?>/280</span>
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded font-semibold">Tweet</button>
        </div>
    </form>
</div>

<!-- Tweets List -->
<?php $__empty_1 = true; $__currentLoopData = $tweets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tweet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
<div class="bg-white dark:bg-gray-800 rounded-xl shadow p-4 flex space-x-4 hover:bg-gray-50 dark:hover:bg-gray-700 transition">
    <img src="<?php echo e(optional($tweet->user->profile)->avatar ? asset('avatars/'.optional($tweet->user->profile)->avatar) : 'https://ui-avatars.com/api/?name='.urlencode($tweet->user->name)); ?>"
         alt="Avatar" class="w-12 h-12 rounded-full border border-gray-300 dark:border-gray-600">

    <div class="flex-1">
        <div class="flex justify-between items-center mb-1">
            <div class="flex items-center space-x-2">
                <span class="font-bold"><?php echo e($tweet->user->name); ?></span>
                <span class="text-gray-500 text-sm dark:text-gray-400">{{ Str::slug($tweet->user->name) }}</span>
            </div>
            <span class="text-gray-500 text-sm dark:text-gray-400"><?php echo e($tweet->created_at->diffForHumans()); ?></span>
        </div>
        <p class="text-gray-800 dark:text-gray-200 mb-2"><?php echo e($tweet->content); ?></p>

        <!-- Actions -->
        <div class="flex space-x-6 text-gray-500 dark:text-gray-400 text-sm">
            <form action="<?php echo e(route('tweet.like', $tweet)); ?>" method="POST" class="flex items-center space-x-1">
                <?php echo csrf_field(); ?>
                <button type="submit" class="hover:text-blue-500 flex items-center">❤️ <?php echo e($tweet->likes->count()); ?></button>
            </form>
            <form action="<?php echo e(route('tweet.retweet', $tweet)); ?>" method="POST" class="flex items-center space-x-1">
                <?php echo csrf_field(); ?>
                <button type="submit" class="hover:text-green-500 flex items-center">🔁 <?php echo e($tweet->retweets->count()); ?></button>
            </form>
        </div>
    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
<div class="text-center text-gray-500 dark:text-gray-400 p-4 bg-white dark:bg-gray-800 rounded-xl shadow">
    No tweets yet. Be the first to tweet!
</div>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/icyjemtalay/chirper/resources/views/tweets/index.blade.php ENDPATH**/ ?>