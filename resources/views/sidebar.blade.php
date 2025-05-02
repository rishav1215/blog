<aside class="w-64 bg-white p-6 shadow-md">
        <h4 class="text-xl font-semibold text-blue-600 mb-6">Admin Panel</h4>
        <ul class="space-y-3">
            <li>
                <a href="{{ route('posts.dashboard') }}"
                   class="flex items-center px-3 py-2 rounded-md transition 
                          {{ request()->routeIs('posts.dashboard') ? 'bg-gray-200 font-bold' : 'hover:bg-gray-100' }}">
                    <i class="bi bi-speedometer2 mr-2"></i> Dashboard
                </a>
            </li>
            <li>
                <a href="{{ route('posts.manageposts') }}"
                   class="flex items-center px-3 py-2 rounded-md transition 
                          {{ request()->routeIs('posts.manageposts') ? 'bg-gray-200 font-bold' : 'hover:bg-gray-100' }}">
                    <i class="bi bi-file-earmark-text mr-2"></i> Manage Posts
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center px-3 py-2 rounded-md hover:bg-gray-100">
                    <i class="bi bi-people-fill mr-2"></i> Manage Users
                </a>
            </li>
            <li>
                <a href="{{ route('topics.index') }}"
                   class="flex items-center px-3 py-2 rounded-md transition 
                          {{ request()->routeIs('topics.index') ? 'bg-gray-200 font-bold' : 'hover:bg-gray-100' }}">
                    <i class="bi bi-tags-fill mr-2"></i> Manage Topics
                </a>
            </li>
        </ul>
    </aside>