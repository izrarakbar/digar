import React from 'react';
import { Link } from 'react-router-dom';
import { motion } from 'framer-motion';
import './Home.css';

const Home = () => {
    return (
        <div className="home">
            <motion.div
                className="jumbotron"
                initial={{ opacity: 0 }}
                animate={{ opacity: 1 }}
                transition={{ duration: 1.5 }}
            >
                <img
                    src="https://via.placeholder.com/1500x600"
                    alt="Jumbotron"
                    className="jumbotron-img"
                />
                <div className="jumbotron-content">
                    <h1>Welcome to My Website</h1>
                    <p>Your business, our solution.</p>
                    <Link to="/login">
                        <motion.button
                            className="login-btn"
                            whileHover={{ scale: 1.1 }}
                            whileTap={{ scale: 0.9 }}
                        >
                            Login
                        </motion.button>
                    </Link>
                </div>
            </motion.div>

            <section className="features">
                <h2>Why Choose Us?</h2>
                <p>We offer the best services to grow your business.</p>
                <div className="feature-grid">
                    <div className="feature-item">
                        <h3>Quality</h3>
                        <p>We provide the highest quality services.</p>
                    </div>
                    <div className="feature-item">
                        <h3>Support</h3>
                        <p>24/7 customer support to assist you anytime.</p>
                    </div>
                    <div className="feature-item">
                        <h3>Expertise</h3>
                        <p>Our team consists of industry experts.</p>
                    </div>
                </div>
            </section>
        </div>
    );
};

export default Home;
