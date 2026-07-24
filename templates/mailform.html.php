<div class="contact-container" style="max-width: 800px; margin: 0 auto; padding: 20px; font-family: Arial, sans-serif;">
    <h2>Get in Touch</h2>
    <p>If you have any questions, feedback, or need assistance, please drop us a message using the form below or contact our student support center directly.</p>
    
    <div style="display: flex; gap: 40px; margin-top: 30px; flex-wrap: wrap;">
        <div style="flex: 1; min-width: 300px;">
            <form action="contact.php" method="POST" style="display: flex; flex-direction: column; gap: 15px;">
                <div>
                    <label for="name" style="display: block; margin-bottom: 5px; font-weight: bold;">Your Name:</label>
                    <input type="text" id="name" name="name" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">
                </div>

                <div>
                    <label for="email" style="display: block; margin-bottom: 5px; font-weight: bold;">Your Email:</label>
                    <input type="email" id="email" name="email" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">
                </div>

                <div>
                    <label for="message" style="display: block; margin-bottom: 5px; font-weight: bold;">Message:</label>
                    <textarea id="message" name="message" rows="5" required placeholder="Type your message here..." style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; resize: vertical;"></textarea>
                </div>

                <button type="submit" style="background-color: #2bb673; color: white; border: none; padding: 12px 20px; font-size: 16px; font-weight: bold; border-radius: 4px; cursor: pointer; transition: background 0.3s; align-self: flex-start;">
                    Send Email
                </button>
            </form>
        </div>

        <div style="flex: 1; min-width: 250px; padding: 20px; border-radius: 4px; border-left: 5px solid #2f22e7;">
            <h3 style="margin-top: 0; color: #333;">Contact Information</h3>
            <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 15px;">
                <li>
                    <strong>📍 Address:</strong><br>
                    UNIVERSITY OF GREENWICH VIETNAM
                </li>
                <li>
                    <strong>📞 Phone:</strong><br>
                    +084 529 7759
                </li>
                <li>
                    <strong>✉️ Email Support:</strong><br>
                    <a href="mailto:pm76@gre.ac.uk" style="color: #2bb673; text-decoration: none;">lcv76@gre.ac.uk</a>
                </li>
                <li>
                    <strong>🕒 Office Hours:</strong><br>
                    Monday - Friday: 8:00 AM - 5:00 PM
                </li>
            </ul>
        </div>

    </div>
</div>