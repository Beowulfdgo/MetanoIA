const { algoliasearch, instantsearch } = window;

const searchClient = algoliasearch(
  'B94Q6KGJS1',
  '418f91012bb17440e8e3a101c56b019f'
);

const search = instantsearch({
  indexName: 'patients',
  searchClient,
  future: { preserveSharedStateOnUnmount: true },
});

search.addWidgets([
  instantsearch.widgets.searchBox({
    container: '#searchbox',
  }),
  instantsearch.widgets.hits({
    container: '#hits',
    templates: {
      item: (hit, { html, components }) => html`
        <article>
          <img src=${hit.avatar} alt=${hit.name} />
          <div>
            <h1>${components.Highlight({ hit, attribute: 'name' })}</h1>
            <p>${components.Highlight({ hit, attribute: 'apellido' })}</p>
            <p>
              ${components.Highlight({ hit, attribute: 'correo_electronico' })}
            </p>
          </div>
        </article>
      `,
    },
  }),
  instantsearch.widgets.configure({
    hitsPerPage: 8,
  }),
  instantsearch.widgets.pagination({
    container: '#pagination',
  }),
]);

search.start();
