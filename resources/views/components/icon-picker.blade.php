<!-- resources/views/components/icon-picker.blade.php -->
<div>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    {{-- <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet"> --}}
    
    <style>
        .icon-trigger {
            cursor: pointer;
            padding: 10px;
            border: 1px solid #5b3a1f;
            color: #5b3a1f;
            background-color: #eadfd6;
            border-radius: 7px;
            display: inline-flex;
            align-items: center;
            gap: 10px;
        }
        
        .icon-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.5);
            z-index: 1000;
        }
        
        .icon-modal-content {
            position: relative;
            background: white;
            width: 90%;
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            border-radius: 8px;
            max-height: 80vh;
            overflow-y: auto;
        }
        
        .icon-search {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }
        
        .icon-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(100px, 1fr));
            gap: 10px;
            margin-top: 20px;
        }
        
        .icon-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 10px;
            border: 1px solid #eee;
            border-radius: 4px;
            cursor: pointer;
            transition: all 0.2s;
        }
        
        .icon-item:hover {
            background: #f5f5f5;
            transform: scale(1.05);
        }
        
        .icon-item.selected {
            background: #e3f2fd;
            border-color: #2196f3;
        }
        
        .icon-name {
            font-size: 12px;
            margin-top: 5px;
            text-align: center;
            word-break: break-all;
        }
        
        .icon-preview {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px;
        }
        
        .close-modal {
            position: absolute;
            right: 20px;
            top: 20px;
            cursor: pointer;
            font-size: 24px;
        }
        
        .icon-categories {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
            overflow-x: auto;
            padding-bottom: 10px;
        }
        
        .category-btn {
            padding: 5px 15px;
            border: 1px solid #5b3a1f;
            background-color: #eadfd6;
            color: #5b3a1f;
            border-radius: 20px;
            cursor: pointer;
            white-space: nowrap;
        }
        
        .category-btn.active {
            background: #5b3a1f;
            color: white;
            border-color: #5b3a1f;
        }
    </style>

    <!-- Icon Trigger Button -->
    <div class="icon-trigger" onclick="openIconPicker()">
        <i class="material-icons-round" id="selected-icon-display">{{ $selected ?? 'add' }}</i>
        <span>Pilih Ikon</span>
    </div>

    <!-- Hidden Input -->
    {{-- <input type="hidden" name="items[0][icon]" id="icon-input" value="{{ $selected ?? '' }}"> --}}
    <input type="hidden" name="icon" id="icon-input" value="{{ $selected ?? '' }}">

    <!-- Icon Modal -->
    <div class="icon-modal" id="icon-modal">
        <div class="icon-modal-content">
            <span class="close-modal" onclick="closeIconPicker()">&times;</span>
            
            <h3 class="text-2xl font-medium text-primary-700 mb-5">Pilih Ikon</h3>
            
            <div class="icon-preview">
                Ikon yang Dipilih: 
                <i class="material-icons-round" id="preview-icon">{{ $selected ?? 'add' }}</i>
                <span id="preview-icon-name">{{ $selected ?? 'add' }}</span>
            </div>
            
            <input type="text" class="icon-search" placeholder="Search icons..." onkeyup="searchIcons()">
            
            <div class="icon-categories" id="icon-categories"></div>
            
            <div class="icon-grid" id="icon-grid"></div>
        </div>
    </div>

    <script>
        const iconCategories = {
            'Action': ['home', 'settings', 'search', 'done', 'menu', 'favorite', 'bolt', 'toggle_off', 'key', 'shopping_cart_checkout', 'block', 'settings_accessibility', 'fullscreen', 'swap_horiz', 'upload', 'token',  'swipe_left', 'swipe_up', 'shopping_cart', 'description', 'logout', 'manage_accounts', 'fingerprint', 'login', 'paid', 'shopping_bag', 'trending_up', 'account_circle', 'visibility', 'favorite_border', 'lock', 'verified', 'schedule', 'face', 'history', 'build', 'print', 'admin_panel_settings', 'savings', 'receipt', 'grade', 'room', 'lock_open', 'bookmark', 'payment', 'pending_actions', 'explore', 'pets', 'shopping_basket', 'tips_and_updates', 'card_giftcard', 'thumb_up_off_alt', 'view_in_ar', 'dns', 'assignment_turned_in', 'flight_takeoff', 'gavel', 'book', 'translate', 'rocket_launch', 'accessibility', 'add_task', 'dashboard_customize', 'redeem', 'group_work', 'nightlight_round', 'query_builder', 'circle_notifications', 'accessible', 'translate', 'offline_bolt', 'aspect_ratio', 'opacity', 'commute', 'tour', 'view_sidebar', 'toll', 'pregnant_woman', 'next_plan', 'work_history', 'credit_card_off', 'view_timeline', 'lightbulb_outline', 'lock_person', 'browse_gallery', 'add_home', 'view_compact_alt', 'width_wide', 'error', 'warning', 'info', 'help', 'sell', 'thermostat', 'widgets'],

            'Navigation': ['arrow_back', 'arrow_forward', 'menu', 'more_vert', 'payments', 'check', 'campaign', 'maps_home_work', 'legend_toggle', 'assistant_direction', 'add_home_work', 'pivot_table_chart', 'light_mode', 'dark_mode', 'task'],

            'Communication': ['mail', 'message', 'phone', 'chat', 'location_on', 'business', 'list_alt', 'vpn_key', 'alternate_email', 'chat_bubble', 'qr_code_2', 'hub', 'import_contacts', 'hourglass_bottom', 'rss_feed', 'mark_email_read', 'mark_email_unread', 'call_end', 'dialpad', 'document_scanner', 'cancel_presentation', 'cell_tower', 'ring_volume', 'duo', 'voicemail', 'call_merge', 'spoke', 'contact_emergency', 'pause_presentation', 'wifi_calling', 'nat', 'stay_current_landscape'],

            'File': ['folder', 'file_copy', 'cloud_upload', 'attachment', 'download', 'cloud', 'newspaper', 'folder_shared', 'approval', 'workspaces', 'topic', 'cloud_circle', 'add', 'remove', 'create', 'upload', 'send', 'inventory_2', 'flag', 'bolt', 'create', 'calculate', 'shield', 'inbox', 'ballot', 'outlined_flag', 'where_to_vote', 'square_foot', 'waves', 'how_to_vote', 'weekend', 'gesture', 'upcoming', 'attribution', 'web_stories', 'next_week', 'insights', 'create', 'content_paste', 'how_to_reg', 'waves', 'square_foot', 'stream'],

            'Social': ['person', 'group', 'share', 'notifications', 'groups', 'public', 'emoji_events', 'engineering', 'construction', 'water_drop', 'location_city', 'emoji_emotions', 'sports_esports', 'sentiment_satisfied', 'science', 'emoji_objects', 'cake', 'emoji_people', 'whatshot', 'self_improvement', 'domain', 'recommend', 'recycling', 'real_estate_agent', 'architecture', 'hiking', 'masks', 'luggage', 'diversity_3', 'interests', 'night_stay', 'king_bed', 'compost', 'sports_basketball', 'emoji_food_beverage', 'cookie', 'wallet', 'elderly', 'add_moderator', 'scale', 'fireplace', 'hive', 'sports_volleyball', 'diversity_2', 'domain_add', 'face_6', 'face_4', 'face_3', 'elderly_woman', 'flood', 'no_luggage'],

            'Maps & Places': ['local_shipping', 'menu_book', 'local_offer', 'badge', 'map', 'restaurant', 'directions_car', 'local_fire_department', 'volunteer_activism', 'flight', 'local_mall', 'near_me', 'directions_run', 'restaurant_menu', 'celebration', 'lunch_dining', 'local_library', 'park', 'local_atm', 'local_activity', 'person_pin', 'design_services', 'directions_bus', 'local_cafe', 'delivery_dining', 'local_police', 'directions_bike', 'fastfood', 'cleaning_services', 'hotel', 'home_repair_services', 'navigation', 'local_grocery_store', 'diamond', 'train', 'local_parking', 'local_florist', 'factory', 'money', 'local_post_office', 'directions', 'two_wheeler', 'add_business', 'traffic', 'directions_boat', 'warehouse', 'local_bar', 'agriculture', 'emergency', 'pedal_bike', '360', 'liquor', 'local_airport', 'local_taxi', 'hail', 'local_dining', 'directions_bus_filled', 'local_printshop', 'theater_comedy', 'local_pizza', 'forest', 'transfer_within_a_station', 'dinner_dining', 'bakery_dining', 'wine_bar', 'terrain', 'store_mall_directory', 'departure_board', 'nightlife', 'hardware', 'local_pharmacy', 'museum', 'ev_station', 'electric_car', 'local_see', 'festival', 'plumbing', 'car_rental', 'medical_information', 'church', 'pest_control', 'edit_attributes', 'car_repair', 'moped', 'tram', 'subway', 'straight', 'hvac', 'signpost', 'local_movies', 'brunch_dining', 'transit_enterexit', 'directions_transit', 'stadium', 'mosque', 'egg', 'compass_calibration', 'local_play', 'tire_repair', 'sos', 'flight_class', 'fire_truck', 'synagogue', 'temple_hindu', 'fire_hydrant_alt', 'apartment', 'storefront', 'business_center', 'spa', 'meeting_room', 'cottage', 'checkroom', 'grass', 'beach_access', 'pool', 'airport_shuttle', 'free_breakfast', 'villa', 'smoke_free', 'hot_tub', 'fire_extinguisher', 'balcony', 'iron', 'bungalow'], 

            'Audio & Video': ['play_arrow', 'play_circle', 'mic', 'videocam', 'volume_up', 'replay', 'stop', 'movie', 'web', 'video_library', 'hearing', 'recent_actors', 'subtitles', 'games', 'radio', 'add_to_queue', 'airplay', 'call_to_action', 'hd', 'video_label', 'art_track', '4k', 'surround_sound', 'sd', '8k', 'airplay', 'live_tv', 'personal_video'],

            'Notification': ['support_agent', 'wifi', 'account_tree', 'sync', 'event_available', 'event_note', 'sms', 'live_tv', 'ondemand_video', 'drive_eta', 'more', 'wc', 'do_not_disturb', 'power', 'vpn_lock', 'enhanced_encryption', 'adb', 'airline_seat_recline_extra', 'imagesearch_roller', 'signal_cellular_4_bar'],
            
            'Hardware': ['smartphone', 'computer', 'security', 'desktop_windows', 'laptop', 'headphones', 'tv', 'point_of_sale', 'router', 'phonelink', 'speaker', 'connected_tv'],
            // Add more categories as needed
        };

        let currentCategory = 'all';
        
        function initializeIconPicker() {
            // Create category buttons
            const categoriesContainer = document.getElementById('icon-categories');
            categoriesContainer.innerHTML = `
                <span class="category-btn active" onclick="filterByCategory('all')">All</span>
                ${Object.keys(iconCategories).map(category => 
                    `<span class="category-btn" onclick="filterByCategory('${category}')">${category}</span>`
                ).join('')}
            `;
            
            // Load initial icons
            loadIcons();
        }

        function loadIcons() {
            const grid = document.getElementById('icon-grid');
            grid.innerHTML = '';
            
            let icons = [];
            if (currentCategory === 'all') {
                icons = Object.values(iconCategories).flat();
            } else {
                icons = iconCategories[currentCategory] || [];
            }
            
            icons.forEach(icon => {
                const div = document.createElement('div');
                div.className = 'icon-item';
                div.onclick = () => selectIcon(icon);
                div.innerHTML = `
                    <i class="material-icons-round">${icon}</i>
                    <span class="icon-name">${icon}</span>
                `;
                grid.appendChild(div);
            });
        }

        function searchIcons() {
            const searchTerm = document.querySelector('.icon-search').value.toLowerCase();
            const items = document.querySelectorAll('.icon-item');
            
            items.forEach(item => {
                const iconName = item.querySelector('.icon-name').textContent.toLowerCase();
                item.style.display = iconName.includes(searchTerm) ? '' : 'none';
            });
        }

        function selectIcon(iconName) {
            // Update hidden input
            document.getElementById('icon-input').value = iconName;
            
            // Update preview
            document.getElementById('preview-icon').textContent = iconName;
            document.getElementById('preview-icon-name').textContent = iconName;
            
            // Update trigger button icon
            document.getElementById('selected-icon-display').textContent = iconName;
            
            // Update selected state
            document.querySelectorAll('.icon-item').forEach(item => {
                item.classList.remove('selected');
                if (item.querySelector('.icon-name').textContent === iconName) {
                    item.classList.add('selected');
                }
            });
        }

        function filterByCategory(category) {
            currentCategory = category;
            
            // Update active state of category buttons
            document.querySelectorAll('.category-btn').forEach(btn => {
                btn.classList.remove('active');
                if (btn.textContent.toLowerCase() === category.toLowerCase()) {
                    btn.classList.add('active');
                }
            });
            
            loadIcons();
        }

        function openIconPicker() {
            document.getElementById('icon-modal').style.display = 'block';
        }

        function closeIconPicker() {
            document.getElementById('icon-modal').style.display = 'none';
        }

        // Close modal when clicking outside
        window.onclick = function(event) {
            const modal = document.getElementById('icon-modal');
            if (event.target === modal) {
                closeIconPicker();
            }
        }

        // Initialize when document is ready
        document.addEventListener('DOMContentLoaded', initializeIconPicker);
    </script>
</div>