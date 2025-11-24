<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TwitterClone</title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>
<body class="bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100">

    <!-- Top Navbar -->
    <nav class="bg-white dark:bg-gray-800 shadow sticky top-0 z-50">
        <div class="max-w-3xl mx-auto flex justify-between items-center px-4 py-3">
            <!-- Logo -->
            <a href="<?php echo e(route('home')); ?>" class="text-blue-500 text-3xl font-bold hover:bg-blue-100 rounded-full p-2 transition">
                HOME
            </a>

           <!-- Profile / Auth -->
<div class="flex items-center space-x-4">
    <?php if(auth()->guard()->check()): ?>
        <div class="flex items-center space-x-2">
            <a href="<?php echo e(route('profile.show', Auth::user()->id)); ?>" class="flex items-center space-x-2 hover:underline">
                <img src="<?php echo e(optional(Auth::user()->profile)->avatar ? asset('avatars/'.Auth::user()->profile->avatar) : 'https://ui-avatars.com/api/?name='.urlencode(Auth::user()->name)); ?>"
                     alt="Avatar" class="w-8 h-8 rounded-full border border-gray-300">
                <span class="font-semibold hidden sm:inline"><?php echo e(Auth::user()->name); ?></span>
            </a>
            <form method="POST" action="<?php echo e(route('logout')); ?>">
                <?php echo csrf_field(); ?>
                <button type="submit" class="text-red-500 px-3 py-1 rounded-full hover:bg-red-100 transition">Logout</button>
            </form>
        </div>
    <?php else: ?>
        <a href="<?php echo e(route('login')); ?>" class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-full font-semibold transition">Login</a>
        <a href="<?php echo e(route('register')); ?>" class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-full font-semibold transition">Register</a>
    <?php endif; ?>
</div>

        </div>
    </nav>

    <!-- Main Feed -->
    <main class="max-w-3xl mx-auto mt-6 space-y-4 px-4">
        <?php echo $__env->yieldContent('content'); ?>
    </main>

</body>
</html>
<?php /**PATH /Users/icyjemtalay/chirper/resources/views/layouts/app.blade.php ENDPATH**/ ?>