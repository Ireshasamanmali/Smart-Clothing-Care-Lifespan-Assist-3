<?php
require_once 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Clothing Care & Lifespan Assistant | Sri Lanka</title>
    <!-- Google Fonts & Font Awesome Icons -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    <!-- 1. Navigation Bar -->
    <nav class="navbar">
        <div class="nav-brand">
            <i class="fa-solid fa-leaf"></i> Smart Care <span>LK</span>
        </div>
        <ul class="nav-links">
            <li><a href="#home" class="active">Home</a></li>
            <li><a href="#analyze">Clothing Analysis</a></li>
            <li><a href="#weather">Weather Care</a></li>
            <li><a href="#damage">Damage & Repair</a></li>
            <li><a href="#reminders">Reminders</a></li>
            <li><a href="#guide">Educational Guide</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>
        <a href="#analyze" class="btn btn-primary"><i class="fa-solid fa-wand-magic-sparkles"></i> Get Started</a>
    </nav>

    <!-- 2. Homepage Hero Section -->
    <header id="home" class="hero">
        <div class="hero-content">
            <span class="badge" style="margin-bottom: 1rem;"><i class="fa-solid fa-cloud-sun-rain"></i> Sri Lanka Monsoon & Fabric Care AI</span>
            <h1>Take Better Care of Your Clothes, Make Them Last Longer.</h1>
            <p>Empowering Sri Lankan households, professionals, and eco-conscious consumers with intelligent fabric care routines, monsoon drying strategies, and AI damage identification.</p>
            <div class="hero-buttons">
                <a href="#analyze" class="btn btn-primary"><i class="fa-solid fa-camera"></i> Analyze My Clothing</a>
                <a href="#weather" class="btn btn-secondary"><i class="fa-solid fa-cloud-rain"></i> Monsoon Drying Tips</a>
            </div>
        </div>
        <div class="hero-image">
            <img src="https://images.unsplash.com/photo-1558769132-cb1aea458c5e?q=80&w=1000&auto=format&fit=crop" alt="Organized Sustainable Wardrobe and Clean Fabrics">
        </div>
    </header>

    <main class="container">

        <!-- 3 & 4. Clothing Information Analysis & Recommendations -->
        <section id="analyze" style="margin-bottom: 5rem;">
            <div class="section-title">
                <h2>👕 Smart Clothing Information Analysis</h2>
                <p>Upload a photo or enter garment details to receive custom washing, water temperature, drying, and storage instructions.</p>
            </div>
            
            <div class="grid-3" style="grid-template-columns: 1fr 1fr; gap: 2.5rem;">
                <!-- Form Box -->
                <div class="card">
                    <form id="clothingAnalysisForm" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Upload Clothing Photo</label>
                            <div class="upload-box" id="clothingUploadBox">
                                <i class="fa-solid fa-cloud-arrow-up" style="font-size: 2.5rem; color: var(--sage-green);"></i>
                                <p style="margin-top: 0.5rem; font-weight:600;">Drag & Drop or Click to Upload</p>
                                <small style="color: var(--text-muted);">Supports JPG, PNG (Max 5MB)</small>
                                <input type="file" id="clothingImageInput" name="clothing_photo" accept="image/*" style="display:none;">
                            </div>
                            <div id="clothingPreview"></div>
                            <small style="color:var(--text-muted); display:block; margin-top:0.4rem;">📷 Note: Image upload ready for AI Vision API Integration</small>
                        </div>

                        <div class="form-group">
                            <label for="category">Garment Category</label>
                            <select id="category" name="category" required>
                                <option value="">Select Category...</option>
                                <option value="Shirt">Shirt (Formal / Casual Button-Up)</option>
                                <option value="Trousers">Trousers & Pants</option>
                                <option value="Dress">Dress / Frock</option>
                                <option value="Saree">Saree (Silk / Cotton / Georgette)</option>
                                <option value="T-shirt">T-shirt / Knitwear</option>
                                <option value="Jacket">Jacket / Outerwear</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="fabric">Fabric Type</label>
                            <select id="fabric" name="fabric" required>
                                <option value="">Select Fabric Type...</option>
                                <option value="Cotton">Cotton (High Moisture Retention)</option>
                                <option value="Silk">Silk (Delicate Natural Fiber)</option>
                                <option value="Denim">Denim (Heavy Cotton Twill)</option>
                                <option value="Polyester">Polyester (Quick Drying Synthetic)</option>
                                <option value="Wool">Wool (Protein Fiber)</option>
                                <option value="Linen">Linen (Natural Flax Fiber)</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="color">Garment Color</label>
                            <input type="text" id="color" name="color" class="form-control" placeholder="e.g. Navy Blue, Dark Red, White">
                        </div>

                        <div class="form-group">
                            <label for="details">Additional Garment Notes</label>
                            <textarea id="details" name="details" class="form-control" rows="3" placeholder="e.g., Heavy embroidery, prone to dye bleed, metallic buttons..."></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary" style="width:100%;"><i class="fa-solid fa-magnifying-glass"></i> Analyze & Generate Recommendations</button>
                    </form>
                </div>

                <!-- Guidance & Visual Reference Cards -->
                <div>
                    <div class="card" style="margin-bottom: 1.5rem;">
                        <img src="https://images.unsplash.com/photo-1545127398-14699f92334b?q=80&w=800&auto=format&fit=crop" class="card-img" alt="Cotton and Silk Fabrics">
                        <h3>Natural vs Synthetic Care</h3>
                        <p>Natural fabrics like Cotton and Silk absorb high ambient humidity in Sri Lanka. Always ensure silk is washed in cold water and air-dried flat in shaded, well-ventilated areas.</p>
                    </div>

                    <div id="analysisResults" class="results-panel" style="display:none;"></div>
                </div>
            </div>
        </section>

        <!-- 5. Weather-Based Clothing Care Guidance -->
        <section id="weather" style="margin-bottom: 5rem;">
            <div class="section-title">
                <h2>🌧️ Weather-Based Clothing Care Guidance</h2>
                <p>Adapted specifically for Sri Lanka's tropical climate, monsoonal rainfall, and high humidity.</p>
            </div>

            <div class="card" style="background: linear-gradient(135deg, #FFFFFF 0%, var(--sage-light) 100%);">
                <div style="display: flex; gap: 1.5rem; align-items: center; flex-wrap: wrap; margin-bottom: 1.5rem;">
                    <label style="font-weight:700; font-size:1.1rem;"><i class="fa-solid fa-cloud-sun"></i> Select Current Weather Condition:</label>
                    <select id="weatherSelect" style="max-width:320px;">
                        <option value="Rainy">Monsoon / Continuous Heavy Rain</option>
                        <option value="High Humidity">High Ambient Humidity (Damp Air)</option>
                        <option value="Sunny">Hot & Sunny (High UV Rays)</option>
                        <option value="Indoor Drying">Indoor Drying Difficulties</option>
                    </select>
                    <small style="color:var(--text-muted);"><i class="fa-solid fa-tower-broadcast"></i> Live Weather API Integration Point</small>
                </div>

                <div id="weatherDisplay">
                    <div class="card" style="border-left: 5px solid #0284C7;">
                        <h4>🌧️ Care Strategy: Monsoon / Continuous Heavy Rain</h4>
                        <p><strong>Drying Recommendation:</strong> Use indoor drying racks combined with an electric fan or dehumidifier. Apply an extra spin cycle in your washing machine to remove up to 30% more residual water.</p>
                        <p><strong>Storage Strategy:</strong> Maintain 2 to 3 inches of space between closet hangers. Use breathable cotton garment covers instead of plastic bags.</p>
                        <p style="color:#92400E; margin-top: 0.5rem;"><strong>🛡️ Mold & Musty Odor Prevention:</strong> Ensure thick garment seams and pockets are 100% dry before putting away. Fungal spores proliferate rapidly above 75% relative humidity.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- 6 & 7. Clothing Damage Identification & Repair Recommendations -->
        <section id="damage" style="margin-bottom: 5rem;">
            <div class="section-title">
                <h2>🔍 Clothing Damage Identification & Repair</h2>
                <p>Detect visible damage, fabric fading, tears, and mold, and get step-by-step DIY restoration advice.</p>
            </div>

            <div class="grid-3" style="grid-template-columns: 1fr 1fr;">
                <div class="card">
                    <h3>Upload Damaged Garment</h3>
                    <form id="damageForm">
                        <div class="form-group" style="margin-top:1rem;">
                            <div class="upload-box" id="damageUploadBox">
                                <i class="fa-solid fa-camera-retro" style="font-size: 2.5rem; color: var(--forest-green);"></i>
                                <p style="margin-top:0.5rem; font-weight:600;">Upload Damage Photo</p>
                                <input type="file" id="damageImageInput" accept="image/*" style="display:none;">
                            </div>
                            <div id="damagePreview"></div>
                        </div>

                        <div class="form-group">
                            <label for="damageType">Primary Visible Damage Type</label>
                            <select id="damageType" required>
                                <option value="Stain">Stain (Oil, Tea, Ink, Soil)</option>
                                <option value="Tear">Tear / Ripped Seam</option>
                                <option value="Mold">Fungal Mold / Mildew Spots</option>
                                <option value="Fading">Color Fading / Dye Degradation</option>
                                <option value="Stiffening">Hard Water Fabric Stiffening</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary" style="width:100%;"><i class="fa-solid fa-wrench"></i> Identify & Get Repair Guide</button>
                    </form>
                </div>

                <div>
                    <div id="damageResult" class="card" style="display:none; background-color: #FFFFFF; border-left: 5px solid var(--forest-green);"></div>
                    
                    <div class="card" style="margin-top: 1.5rem;">
                        <h3>🛠️ Quick Maintenance Tips</h3>
                        <ul style="padding-left: 1.25rem; margin-top:0.75rem; color:var(--text-secondary);">
                            <li><strong>Tea / Curry Stains:</strong> Rinse immediately with cold water. Apply liquid detergent and lemon juice before washing.</li>
                            <li><strong>Loose Buttons:</strong> Use double-strand cotton thread with cross-stitch securing to prevent thread slip.</li>
                            <li><strong>Hard Water Buildup:</strong> Add 1/2 cup of distilled white vinegar to the final rinse cycle to dissolve calcium mineral scaling.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- 8. Clothing Care Reminders Dashboard -->
        <section id="reminders" style="margin-bottom: 5rem;">
            <div class="section-title">
                <h2>⏰ Smart Care Reminders Dashboard</h2>
                <p>Schedule and track garment maintenance, seasonal wardrobe airing, and delicate silk washes.</p>
            </div>

            <div class="grid-3" style="grid-template-columns: 1fr 2fr;">
                <div class="card">
                    <h3>Set New Reminder</h3>
                    <form id="reminderForm" style="margin-top:1rem;">
                        <div class="form-group">
                            <label for="reminderTitle">Task Title</label>
                            <input type="text" id="reminderTitle" class="form-control" placeholder="e.g., Air out silk sarees in shade" required>
                        </div>
                        <div class="form-group">
                            <label for="reminderDate">Scheduled Date</label>
                            <input type="date" id="reminderDate" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="reminderCategory">Category</label>
                            <select id="reminderCategory" class="form-control">
                                <option value="Wash">Special Wash</option>
                                <option value="Maintenance">Maintenance & Repair</option>
                                <option value="Fabric Care">Dehumidifier / Mold Check</option>
                                <option value="Storage">Seasonal Storage</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary" style="width:100%;"><i class="fa-solid fa-plus"></i> Add Reminder</button>
                    </form>
                </div>

                <div class="card">
                    <h3>Upcoming Wardrobe Care Tasks</h3>
                    <div id="remindersList" style="margin-top:1.5rem;">
                        <div class="reminder-item">
                            <div>
                                <strong>Wash Silk Saree</strong> (Special Fabric Care)
                                <br><small style="color:#6B7280;">Scheduled: 2026-11-28</small>
                            </div>
                            <button class="btn btn-secondary" style="padding:0.4rem 0.8rem; font-size:0.8rem;">Complete</button>
                        </div>
                        <div class="reminder-item">
                            <div>
                                <strong>Inspect Wardrobe Silica Gel Absorbers</strong> (Storage)
                                <br><small style="color:#6B7280;">Scheduled: 2026-12-05</small>
                            </div>
                            <button class="btn btn-secondary" style="padding:0.4rem 0.8rem; font-size:0.8rem;">Complete</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 9. Educational Clothing Care Guide -->
        <section id="guide" style="margin-bottom: 5rem;">
            <div class="section-title">
                <h2>📚 Educational Clothing Care Guide</h2>
                <p>Master ISO 3758 laundry care symbols, prevent common mistakes, and extend your wardrobe's lifespan.</p>
            </div>

            <div class="grid-3">
                <div class="card">
                    <img src="https://images.unsplash.com/photo-1582735689369-4fe89db7114c?q=80&w=800&auto=format&fit=crop" class="card-img" alt="Washing Laundry Symbols">
                    <h3>5 Core ISO 3758 Symbols</h3>
                    <p>Learn to decode the standard 5 care symbols: Washtub (Washing), Triangle (Bleaching), Square (Drying), Iron (Ironing), and Circle (Professional Care).</p>
                </div>

                <div class="card">
                    <img src="https://images.unsplash.com/photo-1517677208171-0bc6725a3e60?q=80&w=800&auto=format&fit=crop" class="card-img" alt="Laundry Machine Care">
                    <h3>11 Common Laundry Errors</h3>
                    <p>Avoid overloading washing machines, using excessive detergent powder, mixing dark and light fabrics, and wringing delicate silk or wool fibers.</p>
                </div>

                <div class="card">
                    <img src="https://images.unsplash.com/photo-1540555700478-4be289fbecef?q=80&w=800&auto=format&fit=crop" class="card-img" alt="Sustainable Fabric Care">
                    <h3>Sustainable Garment Lifespan</h3>
                    <p>Washing clothes inside out in cold water reduces energy consumption by 75%, preserves dye molecules, and extends clothing life by up to 3 years.</p>
                </div>
            </div>
        </section>

        <!-- 10 & 11. About Us & Target Users -->
        <section id="about" style="margin-bottom: 5rem;">
            <div class="section-title">
                <h2>🌱 About the Project & Target Users</h2>
                <p>Bridging artificial intelligence with sustainable fashion care tailored for Sri Lankan consumers.</p>
            </div>

            <div class="card" style="background-color: #FFFFFF; border-top: 5px solid var(--forest-green); padding: 2.5rem;">
                <h3>Project Mission & Impact</h3>
                <p style="margin-top:0.75rem; color:var(--text-secondary);">
                    The <strong>Smart Clothing Care & Lifespan Assistant</strong> is an AI-powered initiative created to address premature garment degradation caused by Sri Lanka's high ambient humidity, intense tropical sunlight, and monsoonal rainfall. By combining fabric chemical science, machine vision image analysis, and local climate adaptation, our platform helps users reduce replacement expenses, extend clothing lifespan, and eliminate unnecessary textile waste.
                </p>

                <h4 style="margin-top: 2rem; margin-bottom: 1rem;">Who Is This Designed For?</h4>
                <div class="grid-3" style="grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 1rem;">
                    <div style="background:var(--sage-light); padding:1rem; border-radius:8px;">
                        <strong><i class="fa-solid fa-user"></i> General Consumers</strong>
                        <p style="font-size:0.85rem; color:var(--text-secondary); margin-top:0.25rem;">Daily guidance for washing and drying household wardrobes.</p>
                    </div>
                    <div style="background:var(--sage-light); padding:1rem; border-radius:8px;">
                        <strong><i class="fa-solid fa-briefcase"></i> Working Professionals</strong>
                        <p style="font-size:0.85rem; color:var(--text-secondary); margin-top:0.25rem;">Maintenance tips for formal shirts, suits, and office attire.</p>
                    </div>
                    <div style="background:var(--sage-light); padding:1rem; border-radius:8px;">
                        <strong><i class="fa-solid fa-graduation-cap"></i> Students & Young Adults</strong>
                        <p style="font-size:0.85rem; color:var(--text-secondary); margin-top:0.25rem;">Quick care hacks for casual wear and activewear.</p>
                    </div>
                    <div style="background:var(--sage-light); padding:1rem; border-radius:8px;">
                        <strong><i class="fa-solid fa-earth-americas"></i> Eco-Conscious Users</strong>
                        <p style="font-size:0.85rem; color:var(--text-secondary); margin-top:0.25rem;">Maximizing clothing lifespan to promote sustainable fashion.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- 12. Contact Us Form -->
        <section id="contact" style="margin-bottom: 3rem;">
            <div class="section-title">
                <h2>📬 Contact Us</h2>
                <p>Have questions or feedback? Reach out to our Sri Lanka clothing care research team.</p>
            </div>

            <div class="card" style="max-width: 700px; margin: 0 auto;">
                <form id="contactForm">
                    <div class="form-group">
                        <label for="contactName">Full Name</label>
                        <input type="text" id="contactName" name="name" class="form-control" required placeholder="Enter your full name">
                    </div>
                    <div class="form-group">
                        <label for="contactEmail">Email Address</label>
                        <input type="email" id="contactEmail" name="email" class="form-control" required placeholder="Enter your email address">
                    </div>
                    <div class="form-group">
                        <label for="contactSubject">Subject</label>
                        <input type="text" id="contactSubject" name="subject" class="form-control" required placeholder="Subject of your query">
                    </div>
                    <div class="form-group">
                        <label for="contactMessage">Message</label>
                        <textarea id="contactMessage" name="message" class="form-control" rows="4" required placeholder="Write your message here..."></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" style="width:100%;"><i class="fa-solid fa-paper-plane"></i> Send Message</button>
                </form>
            </div>
        </section>

    </main>

    <!-- 13. Footer -->
    <footer>
        <div class="footer-content">
            <div>
                <h3 style="color:#FFFFFF; margin-bottom:1rem;"><i class="fa-solid fa-leaf"></i> Smart Clothing Care LK</h3>
                <p style="color:#94A3B8; font-size:0.95rem;">Empowering Sri Lanka with intelligent, sustainable fabric care routines, monsoon drying strategies, and AI wardrobe lifespan optimization.</p>
            </div>
            <div class="footer-col">
                <h4>Quick Links</h4>
                <ul>
                    <li><a href="#home">Home</a></li>
                    <li><a href="#analyze">Clothing Analysis</a></li>
                    <li><a href="#weather">Weather Care</a></li>
                    <li><a href="#damage">Damage Repair</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Resources</h4>
                <ul>
                    <li><a href="#guide">Care Label Guide</a></li>
                    <li><a href="#guide">Fabric Directory</a></li>
                    <li><a href="#about">About Project</a></li>
                    <li><a href="#contact">Contact Us</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Contact Info</h4>
                <p style="color:#94A3B8; font-size:0.9rem;"><i class="fa-solid fa-location-dot"></i> Colombo, Sri Lanka</p>
                <p style="color:#94A3B8; font-size:0.9rem; margin-top:0.4rem;"><i class="fa-solid fa-envelope"></i> info@smartclothingcare.lk</p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; <?php echo date('Y'); ?> Smart Clothing Care & Lifespan Assistant | Designed for Sri Lankan Consumers.</p>
        </div>
    </footer>

    <script src="assets/js/script.js"></script>
</body>
</html>
