import React from 'react';
import { useTranslation } from 'react-i18next';

const LanguageSwitcher = () => {
  const { i18n } = useTranslation();

  const languages = [
    { code: 'pt', name: 'Português', flag: '🇧🇷' },
    { code: 'en', name: 'English', flag: '🇺🇸' },
    { code: 'es', name: 'Español', flag: '🇪🇸' }
  ];

  const handleLanguageChange = (lng) => {
    console.log('Mudando idioma para:', lng);
    i18n.changeLanguage(lng);
  };

  return (
    <div className="language-switcher dropdown">
      <button 
        className="btn btn-outline-light dropdown-toggle" 
        type="button" 
        data-bs-toggle="dropdown"
      >
        {languages.find(lang => lang.code === i18n.language)?.flag} 
        {languages.find(lang => lang.code === i18n.language)?.name}
      </button>
      <ul className="dropdown-menu dropdown-menu-end">
        {languages.map((language) => (
          <li key={language.code}>
            <button 
              className={`dropdown-item ${i18n.language === language.code ? 'active' : ''}`}
              onClick={() => handleLanguageChange(language.code)}
            >
              <span className="flag-icon me-2">{language.flag}</span> 
              {language.name}
            </button>
          </li>
        ))}
      </ul>
    </div>
  );
};

export default LanguageSwitcher;