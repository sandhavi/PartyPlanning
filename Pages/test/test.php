<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width = 1" />
    <link rel="icon" type="image/x-icon" href="../../Include/favicon-icon.svg">
    <link rel="stylesheet" href="globals.css" />
    <link rel="stylesheet" href="style.css" />
    <style>
        .faq-content {
            display: none;
            padding: 10px;
        }
        .active .faq-content {
            display: block;
        }
        .faq-question {
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="help">
        <div class="faq">
            <div class="faq-question">How can I involve my guests in the party planning process?</div>
            <div class="faq-content">
                <!-- Your detailed answer here -->
                Involve them by sending out polls to vote on themes, menus, or activities.
            </div>
        </div>
        <div class="faq">
            <div class="faq-question">How do I start planning my party?</div>
            <div class="faq-content">
                <!-- Your detailed answer here -->
                We recommend starting by determining the date, budget, and approximate number of guests. From there, you can begin selecting a theme, venue, and vendors.
            </div>
        </div>
        <!-- Repeat for other FAQ items -->
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            const faqs = document.querySelectorAll('.faq');
            faqs.forEach(faq => {
                faq.querySelector('.faq-question').addEventListener('click', () => {
                    const isActive = faq.classList.contains('active');
                    faqs.forEach(f => f.classList.remove('active')); // Close all
                    
                    if (!isActive) {
                        faq.classList.add('active'); // Open this FAQ
                    }
                });
            });
        });
    </script>
</body>
</html>
